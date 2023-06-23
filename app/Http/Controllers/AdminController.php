<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request) {
        if ($request->user()->role == 'admin') {
            // dd($request->user()->role);
            return view('admin.index');
        }
        $this->redirectToAdmin('page not found.', 'error');
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
        $this->redirectToAdmin('Admin Logout Successfully.', 'success');
        return redirect("/");
    }

    public function AdminProfile() {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.adminlist.profile', compact('adminData'));
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file("photo");
            $photoPath = public_path('backend/assets/dist/img/admin_profile/');
            $oldPhoto = $data->photo;

            // Delete the old photo if it exists
            if ($oldPhoto && File::exists($photoPath . $oldPhoto)) {
                File::delete($photoPath . $oldPhoto);
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($photoPath, $filename);
            $data->photo = $filename;
        }

        $data->save();
        return $this->redirectToAdmin('admin Updated successfully', 'success');
    }

    public function adminChangePassword() {
        $id = Auth::user()->id;
        $adminPassword = User::find($id);
        return view("admin.adminlist.password", compact("adminPassword"));
    }

    public function adminUpdatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $this->redirectToAdmin("Old Password doesn't match!", 'error');
            return back();
        }

        User::whereId(auth()->user()->id) -> update([
            'password' => Hash::make($request->new_password)
        ]);

        $this->redirectToAdmin("Password changed successfully", 'success');
        return back();
    }

    private function redirectToAdmin($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->back()->with($notification);
    }
}
