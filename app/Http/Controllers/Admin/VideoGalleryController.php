<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\LiveTv;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Admin\VideoGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends Controller
{
   public function videoGalleryList() {
    $video = VideoGallery::latest()->paginate(6);
    return view('admin.video.index', compact('video'));
   }

   public function videoGalleryAdd() {
    return view('admin.video.add');
   }

   public function videoGallerySave(Request $request) {
    $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(621, 300)->save('backend/assets/dist/img/video/' . $name_gen);
        $save_url = 'backend/assets/dist/img/video/' . $name_gen;

        VideoGallery::insert([
            'title' => $request->title,
            'url' => $request->url,
            'date' => date('d-m-Y'),
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $this->redirectToVideoGallery("video gallery save successfully.", 'success');
        return redirect()->route("video#gallery#list");
   }


    public function videoGalleryEdit($id) {
        $videoEdit = VideoGallery::findOrFail($id);
        return view('admin.video.edit', compact('videoEdit'));
     }


    public function videoGalleryUpdate(Request $request) {
        $video_id = $request->id;
        $video_edit = VideoGallery::findOrFail($video_id);
        $img = $video_edit->image;
        if($request->file('image')) {

            if (File::exists(public_path($img))) {
                File::delete(public_path($img));
            }

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(621, 300)->save('backend/assets/dist/img/video/'. $name_gen);
            $save_url = 'backend/assets/dist/img/video/'. $name_gen;

        VideoGallery::findOrFail($video_id)->update([
            'title' => $request->title,
            'url' => $request->url,
            'date' => date('d-m-Y'),
            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $this->redirectToVideoGallery("Video Gallery Update with image successfully.", 'success');
        return redirect()->route("video#gallery#list");
        } else {
            VideoGallery::findOrFail($video_id)->update([
                'title' => $request->title,
                'url' => $request->url,
                'date' => date('d-m-Y'),
                'updated_at' => Carbon::now(),
            ]);

            $this->redirectToVideoGallery("Video Gallery Update without image successfully.", 'success');
            return redirect()->route("video#gallery#list");
        }
    }


    // live tv

    public function liveTvUpdatePage() {
        $live = LiveTv::findOrFail(1);
        return view('admin.live.update', compact('live'));
    }


    public function liveTvUpdate(Request $request) {
        $live_id = $request->id;
        $live_edit = LiveTv::findOrFail($live_id);
        $img = $live_edit->image;
        if($request->file('image')) {

            if (File::exists(public_path($img))) {
                File::delete(public_path($img));
            }

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(621, 300)->save('backend/assets/dist/img/live/'. $name_gen);
            $save_url = 'backend/assets/dist/img/live/'. $name_gen;

        LiveTv::findOrFail($live_id)->update([
            'url' => $request->url,
            'date' => date('d-m-Y'),
            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $this->redirectToVideoGallery("Live Update with image successfully.", 'success');
        return redirect()->back();
        } else {
            LiveTv::findOrFail($live_id)->update([
                'url' => $request->url,
                'date' => date('d-m-Y'),
                'updated_at' => Carbon::now(),
            ]);

            $this->redirectToVideoGallery("Live Update without image successfully.", 'success');
            return redirect()->back();
        }
    }

    public function videoGalleryDelete($id) {
        $post_image = LiveTv::findOrFail($id);
        $img = $post_image->image;
        unlink($img);
        LiveTv::findOrFail($id)->delete();
        $this->redirectToVideoGallery("Video Gallery Delete successfully.", 'warning');
        return redirect()->route("video#gallery#list");
    }

    private function redirectToVideoGallery($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->route("video#gallery#list")->with($notification);
    }
}
