<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request) {
        if ($request->user()->role == 'admin') {
            // dd($request->user()->role);
            return view('admin.index');
        }
        // dd($request->user()->role);
        return view("errors.404");

    }

    public function adminList() {
        $alladmin = User::where('role', 'admin')->latest()->paginate(5);
        return view('admin.adminlist.index', compact('alladmin'));

    }

    public function AdminLogout(Request $request) {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
