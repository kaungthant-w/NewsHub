<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    //banner list
    public function bannerlist() {
        $bannerlist = Banner::findOrFail(1);
        // $bannerlist = Banner::get();
        return view('admin.banner.index', compact('bannerlist'));
    }

    public function bannerUpdate(Request $request) {
        $bannerId = $request->id;
        $banner = Banner::findOrFail($bannerId);
        $this->bannerValidationCheck($request);

        $this->updateImageIfExists($banner, $request, 'slide_one');
        $this->updateImageIfExists($banner, $request, 'slide_two');
        $this->updateImageIfExists($banner, $request, 'slide_three');
        $this->updateImageIfExists($banner, $request, 'slide_four');

        // Update banner description
        $banner->update(['description' => $request->description]);

        return $this->redirectToBanner('Banner updated successfully', 'success');
    }

    private function updateImageIfExists(Banner $banner, Request $request, $fieldName) {
        if ($request->hasFile($fieldName)) {
            $oldImage = $banner->{$fieldName};
            if ($oldImage) {
                File::delete($oldImage);
            }

            $newImage = $this->uploadImage($request->file($fieldName));
            $banner->update([$fieldName => $newImage]);
        }
    }

    // private function
    private function bannerValidationCheck($request) {
        $validationRules =  [
            'description' => 'required',
            // 'slide_one' => 'required|image|size:1024',
            // 'slide_two' => 'required|image|size:1024',
            // 'slide_three' => 'required|image|size:1024',
            // 'slide_four' => 'required|image|size:1024',
        ];

        $validationMessage = [
            'description.required' => "Fill your description",
            // 'slide_one.required' => "Upload image for slide one",
            // 'slide_two.required' => "Upload image for slide two",
            // 'slide_three.required' => "Upload image for slide three",
            // 'slide_four.required' => "Upload image for slide four",
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }

    private function uploadImage($image) {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('backend/assets/dist/img/banner/'), $name_gen);
        return 'backend/assets/dist/img/banner/' . $name_gen;
    }

    private function redirectToBanner($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->back()->with($notification);
    }
}
