<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User\Review;
use App\Models\User;
use App\Models\Admin\Newspost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewsStore(Request $request) {
        $news = $request->news_id;
        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'news_id' => $news,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $this->redirectToReview("Admin will Approve your comment.", 'success');
        return redirect()->back();
    }


    public function reviewSytem() {
        $reviews = Review::orderBy('id', 'DESC')->paginate(5);
        return view('admin.review.index', compact('reviews'));
    }

    public function reviewInactive($id) {
        Review::findOrFail($id)->update(['status' => 0]);
        $this->redirectToReview("Not Approve review successfully.", 'warning');
        return redirect()->route("review#system");
    }

    public function reviewActive($id) {
        Review::findOrFail($id)->update(['status' => 1]);
        $this->redirectToReview("Approve review successfully.", 'success');
        return redirect()->route("review#system");
    }


    public function reviewDelete($id) {
        Review::findOrFail($id)->delete();
        $this->redirectToReview("Deleted review successfully.", 'warning');
        return redirect()->route("review#system");
    }

    private function redirectToReview($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->back()->with($notification);
    }
}
