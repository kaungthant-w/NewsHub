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

        $this->redirectToReview("have added your comment.", 'success');
        return redirect()->back();
    }


    private function redirectToReview($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->back()->with($notification);
    }
}
