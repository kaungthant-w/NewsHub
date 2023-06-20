<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Newspost;
use Illuminate\Http\Request;

class NewspostController extends Controller
{
    public function newspostList() {
        return view('admin.newspost.index');
    }
}
