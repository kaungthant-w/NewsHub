<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\User\Review;
use Illuminate\Http\Request;
use App\Models\Admin\Newspost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReviewNotification;

class ReviewController extends Controller
{
    public function reviewsStore(Request $request) {

        // $user = Auth::user();
        $user = User::where('role', 'admin')->get();
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

        Notification::send($user, new ReviewNotification($request));
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
        $user = User::find(1);
        $user->unreadNotifications()->update(['read_at' => Carbon::now()]);
        $user->notifications()->delete();
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
