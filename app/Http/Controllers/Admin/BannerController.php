<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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

        // Delete old images if new ones are provided
        if ($request->hasFile('slide_one')) {
            File::delete($banner->slide_one);
            $slide_one = $this->uploadImage($request->file('slide_one'));
            $banner->update(['slide_one' => $slide_one]);
        }

        if ($request->hasFile('slide_two')) {
            File::delete($banner->slide_two);
            $slide_two = $this->uploadImage($request->file('slide_two'));
            $banner->update(['slide_two' => $slide_two]);
        }

        if ($request->hasFile('slide_three')) {
            File::delete($banner->slide_three);
            $slide_three = $this->uploadImage($request->file('slide_three'));
            $banner->update(['slide_three' => $slide_three]);
        }

        if ($request->hasFile('slide_four')) {
            File::delete($banner->slide_four);
            $slide_four = $this->uploadImage($request->file('slide_four'));
            $banner->update(['slide_four' => $slide_four]);
        }

        // Update banner description
        $banner->update(['description' => $request->description]);

        return $this->redirectToBanner('Banner updated successfully', 'success');
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
