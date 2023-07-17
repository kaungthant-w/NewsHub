<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Newspost;
use App\Models\Admin\Subcategory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Psy\Readline\Hoa\Console;

// use Intervention\Image\ImageManagerStatic as Image;

class NewspostController extends Controller
{
    public function newspostList() {
        $allNewsPost = Newspost::latest()->get();
        return view('admin.newspost.index', compact('allNewsPost'));
    }

    public function newspostAdd() {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        return view('admin.newspost.add', compact(['categories', 'subcategories', 'adminuser']));
    }

    public function newspostStore(Request $request) {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
       Image::make($image)->resize(621, 300)->save('backend/assets/dist/img/newspost/news_img/' . $name_gen);
       $save_url = 'backend/assets/dist/img/newspost/news_img/' . $name_gen;

        Newspost::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_eight' => $request->first_section_eight,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'status' => '0',
            'view_count' => '0',
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $this->redirectTonewspost("News Post save successfully.", 'success');
        return redirect()->route("newspost#list");
    }

    public function newspostEdit($id) {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        $newspost = Newspost::findOrFail($id);
        return view('admin.newspost.edit', compact('categories', 'subcategories', 'adminuser', 'newspost'));
    }


    public function newspostUpdate(Request $request) {
        $newspost_id = $request->id;
        if($request->file('image')) {
            $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
       Image::make($image)->resize(621, 300)->save('backend/assets/dist/img/newspost/news_img/' . $name_gen);
       $save_url = 'backend/assets/dist/img/newspost/news_img/' . $name_gen;

        Newspost::findOrFail($newspost_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_eight' => $request->first_section_eight,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $this->redirectTonewspost("News Post Update with image successfully.", 'success');
        return redirect()->route("newspost#list");
        } else {
            Newspost::findOrFail($newspost_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),
                'news_details' => $request->news_details,
                'tags' => $request->tags,
                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_eight' => $request->first_section_eight,
                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'updated_at' => Carbon::now(),
            ]);

            $this->redirectTonewspost("News Post Update without image successfully.", 'success');
            return redirect()->route("newspost#list");
        }
    }

    public function newspostDelete($id) {
        $post_image = Newspost::findOrFail($id);
        $img = $post_image->image;
        unlink($img);
        Newspost::findOrFail($id)->delete();
        $this->redirectTonewspost("News Post Delete successfully.", 'warning');
        return redirect()->route("newspost#list");
    }

    public function newspostInactive($id) {
        Newspost::findOrFail($id)->update(['status' => 0]);
        $this->redirectTonewspost("News Post Inactive successfully.", 'warning');
        return redirect()->route("newspost#list");
    }

    public function newspostActive($id) {
        Newspost::findOrFail($id)->update(['status' => 1]);
        $this->redirectTonewspost("News Post Active successfully.", 'success');
        return redirect()->route("newspost#list");
    }

    public function newspostDetails($id, $slug, Request $request) {
        $news = Newspost::findOrFail($id);
        $tags = $news->tags;
        $tagsall = explode(',', $tags);
        $category_id = $news->category_id;

        $newsKey = $news->id;
        $userIp = $request->ip();

        if (!Session::has($newsKey . '_' . $userIp)) {
            $news->increment('view_count');
            Session::put($newsKey . '_' . $userIp, 1);
        }

        $relativeNews = Newspost::where('status', '1')->where('category_id', $category_id)->where('id', '!=', $id)->inRandomOrder()->orderBy('id', 'desc')->limit(6)->get();
        $latestNews = Newspost::where('status', '1')->latest('created_at')->limit(5)->get();


        return view('frontend.body.details', compact('news', 'tagsall', 'relativeNews', 'latestNews'));
    }

    private function redirectTonewspost($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->route("newspost#list")->with($notification);
    }
}
