<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request) {
        if ($request->user()->role == 'admin') {
            return view('admin.index');
        }
        $this->redirectToAdmin('page not found.', 'error');
        return view("errors.404");

    }

    public function adminList() {
        $alladmin = User::where('role', 'admin')->latest()->paginate(5);
        return view('admin.adminlist.index', compact('alladmin'));

    }

    public function AdminLogout(Request $request) {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $this->redirectToAdmin('Admin Logout Successfully.', 'success');
        return redirect()->back();
    }

    public function AdminProfile() {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $roles = Role::all();
        return view('admin.adminlist.profile', compact('adminData', 'roles'));
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->status = 'active';
        $this->getAdminData($request, $data);

        if ($request->file('photo')) {
            $file = $request->file("photo");
            $photoPath = public_path('backend/assets/dist/img/admin_profile/');
            $oldPhoto = $data->photo;

            // Delete the old photo if it exists
            if ($oldPhoto && File::exists($photoPath . $oldPhoto)) {
                File::delete($photoPath . $oldPhoto);
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($photoPath, $filename);
            $data->photo = $filename;
        }

        $data->save();

        if($request->roles) {
            $data->assignRole($request->roles);
        }
        return $this->redirectToAdmin('admin Updated successfully', 'success');
    }

    public function adminChangePassword() {
        $id = Auth::user()->id;
        $adminPassword = User::find($id);
        return view("admin.adminlist.password", compact("adminPassword"));
    }

    public function adminUpdatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $this->redirectToAdmin("Old Password doesn't match!", 'error');
            return back();
        }

        User::whereId(auth()->user()->id) -> update([
            'password' => Hash::make($request->new_password)
        ]);

        $this->redirectToAdmin("Password changed successfully", 'success');
        return back();
    }

    public function adminAdd() {
        $roles = Role::all();
        return view('admin.account.index', compact('roles'));
    }

    public function adminStore(Request $request) {
        $this->admintValidationCheck($request);
        $data = new User();
        $this->getAdminData($request, $data);
        $data->password = Hash::make($request->password);
        $data->role = 'admin';
        $data->status = 'inactive';
        $data->save();

        if($request->roles) {
            $data->assignRole($request->roles);
        }

        $this->redirectToAdmin("Admin Account add successfully.But it is need to active.", 'success');
        return redirect()->route('admin#list');
    }

    public function adminEdit(Request $request, $id) {
        $data = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.account.edit', compact('data', 'roles'));
    }

    public function adminUpdate(Request $request) {
        $adminId = $request->id;
        $data = User::findOrFail($adminId);
        $this->getAdminData($request, $data);
        $file = $request->file("photo");

        $data->role = 'admin';
        $data->status = 'active';

        if($request->password) {
            $data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $oldImage = User::where('id', $adminId)->first();
            $oldImage = $oldImage->photo;
            $photoPath = "backend/assets/dist/img/admin_profile/";

            if($oldImage != null) {
                Storage::delete($photoPath.$oldImage);
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($photoPath, $filename);
            $data->photo = $filename;
        }

        if($request->roles) {
            $data->roles()->detach();
            $data->assignRole($request->roles);
        }

        $data->save();

        $this->redirectToAdmin("Account Update successfully.", 'success');
        return redirect()->route('admin#list');
    }


    public function adminDelete($id) {
        $data = User::find($id);
        $oldPhoto = $data->photo;
        unlink("backend/assets/dist/img/admin_profile/".$oldPhoto);
        $data->delete();
        $this->redirectToAdmin("Account Delete successfully.", 'warning');
        return redirect()->route('admin#list');
    }

    public function adminActive($id) {
        // dd("active");
        User::findOrFail($id)->update(['status'=>'active']);
        $this->redirectToAdmin("Active Account successfully.", 'success');
        return redirect()->back();
    }

    public function adminInactive($id) {
        // dd('inactive');
        User::findOrFail($id)->update(['status'=>'inactive']);
        $this->redirectToAdmin("Inactive Account successfully.", 'warning');
        return redirect()->back();

    }

    // private function
    private function admintValidationCheck($request) {
        $validationRules =  [
            'username' => 'required|max:50'.$request -> userId,
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ];

        $validationMessage = [
            'name.required' => 'Fill name',
            'username.required' => 'Fill username',
            'email.required' => 'Fill email',
            'email.email' => 'Invalid email format',
            'phone.required' => 'Fill phone',
            'address.required' => 'Fill address',
            'password.required' => 'Fill password'
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }

    private function getAdminData($request, $data) {
        // dd($data);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->role = $request->role;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
    }

    private function redirectToAdmin($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->back()->with($notification);
    }
}
