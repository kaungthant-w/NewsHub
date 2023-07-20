<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CategoryController extends Controller
{

    //retrieve data dashboard
    public function index()
    {
        $categories = Category::latest()->paginate(3);
        return view('admin.category.all', compact('categories'));
    }

    //store data category
    public function storeCategory(Request $request)
    {
        $this -> postValidationCheck($request);
        $data = $this -> getcategoryData($request);
        Category::insert($data);
        return $this->redirectToCategories('Category inserted successfully', 'success');

    }

    // get data to edit category
    public function getCategory($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    //update category
    public function updateCategory(Request $request, $id)
    {
        $this->postValidationCheck($request);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
        $category->save();
        return $this->redirectToCategories('Category updated successfully', 'success');
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return $this->redirectToCategories('Category deleted successfully', 'warning');
    }

    // private function
    private function postValidationCheck($request) {
        $validationRules =  [
            'category_name' => 'required|max:50|unique:categories,category_name,'.$request -> categoryId,
        ];

        $validationMessage = [
            'category_name.required' => 'Fill category name',
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }

    private function getcategoryData($request) {
        return [
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-', $request->category_name)),
            'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ];
    }

    private function redirectToCategories($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->route('all#categories')->with($notification);
    }



    /// subcategory

    // read data from table
    public function subcategoryList() {
        $subcategories = Subcategory::latest()->paginate(3);
        $categories = Category::latest()->get();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    //store data subcategory
    public function storeSubcategory(Request $request)
    {
        $this -> postSubValidationCheck($request);
        $data = $this -> getSubcategoryData($request);
        Subcategory::insert($data);
        return $this->redirectToSubcategories('Subcategory inserted successfully', 'success');

    }

    // edit data subcategory
    public function editSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();

        return response()->json([
            'subcategory' => $subcategory,
            'categories' => $categories,
        ]);
    }

    // update data subcategory
    public function updateSubcategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);

        try {
            $subcategory = Subcategory::findOrFail($id);

            $subcategory->category_id = $validatedData['category_id'];
            $subcategory->subcategory_name = $validatedData['subcategory_name'];
            $subcategory->subcategory_slug = strtolower(str_replace(' ', '-', $request->subcategory_name));

            $subcategory->save();

            $notification = array(
                'message' => "Subcategory updated successfully",
                'alert-type' => 'success'
            );
            return redirect()->route('subcategory#list')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => "Failed to update subcategory",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    //delete data of subcategory
    public function destroySubcategory($id)
    {
        Subcategory::findOrFail($id)->delete();
        return $this->redirectToSubcategories('Subcategory deleted successfully', 'warning');
    }

    public function GetSubCategory($category_id) {
        $subcat = Subcategory::where('category_id', $category_id)->orderBy('subcategory_name', "ASC")->get();
        return json_encode($subcat);
    }

    // private function
    private function postSubValidationCheck($request) {
        $validationRules =  [
            'subcategory_name' => 'required|max:50|unique:subcategories,subcategory_name,'.$request -> subcategoryId,
            'category_id' => 'required'
        ];

        $validationMessage = [
            'subcategory_name.required' => 'Fill subcategory name',
            'category_id.required' => "Choose category name"
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }

    private function getSubcategoryData($request) {
        return [
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-', $request->subcategory_name)),
            'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ];
    }

    private function redirectToSubcategories($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->route('subcategory#list')->with($notification);
    }
}
