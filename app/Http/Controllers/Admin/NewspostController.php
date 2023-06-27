<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Newspost;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Models\User;

class NewspostController extends Controller
{
    public function newspostList() {
        $allNewsPost = Newspost::latest()->get();
        return view('admin.newspost.index', compact('allNewsPost'));
    }

    public function newspostAdd() {
        // dd('news post add');

        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        return view('admin.newspost.add', compact(['categories', 'subcategories', 'adminuser']));
    }
}
