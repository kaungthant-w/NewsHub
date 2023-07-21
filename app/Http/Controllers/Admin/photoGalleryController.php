<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\PhotoGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class photoGalleryController extends Controller
{
    public function gallerylist() {
        $photoList = PhotoGallery::latest()->paginate(6);
        return view('admin.gallery.index', compact('photoList'));
    }

    public function galleryAdd() {
        return view("admin.gallery.add");
    }

    public function gallerySave(Request $request) {
        $image = $request->file('image_multiple');

        foreach($image as $photo_galery) {
            $name_gen = hexdec(uniqid()) . '.' . $photo_galery->getClientOriginalExtension();
            Image::make($photo_galery)->resize(700, 400)->save('backend/assets/dist/img/gallery/'.$name_gen);
            $save_url = 'backend/assets/dist/img/gallery/'.$name_gen;

            PhotoGallery::insert([
                'photo_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);
        }
        $this->redirectToGallery("Save multiple image successfully.", 'success');
        return redirect()->route("gallery#list");
    }

    public function galleryEdit($id) {
        $galleryEdit = PhotoGallery::findOrFail($id);
        return view('admin.gallery.edit', compact('galleryEdit'));
    }

    public function galleryUpdate(Request $request) {
        $photo_id = $request->id;
        $gallery_img = PhotoGallery::findOrFail($photo_id);
        $img = $gallery_img->photo_gallery;
        File::delete(public_path($img));
        if($request->file('image_multiple')) {
            // unlink($img);
            $image = $request->file('image_multiple');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('backend/assets/dist/img/gallery/'.$name_gen);
            $save_url = 'backend/assets/dist/img/gallery/'.$name_gen;
            PhotoGallery::findOrFail($photo_id)->update([
                'photo_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);
        }

        $this->redirectToGallery("updated image successfully.", 'success');
        return redirect()->route("gallery#list");

    }

    public function galleryDelete($id) {
        $photo = PhotoGallery::findOrFail($id);
        $img = $photo->photo_gallery;
        unlink($img);
        PhotoGallery::findOrFail($id)->delete();
        $this->redirectToGallery("deleted image successfully.", 'warning');
        return redirect()->route("gallery#list");
    }

    private function redirectToGallery($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->route("gallery#list")->with($notification);
    }
}
