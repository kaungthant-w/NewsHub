<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function UserFrontendDashboard() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view("frontend.profile.userprofile", compact("userData"));
    }

    public function UserProfileStore(Request $request) {

        // $this->userProfileValidationCheck($request);
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file("photo");
            $photoPath = public_path('frontend/assets/images/userprofile/');
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
        return $this->redirectToUserProfile('user Updated successfully', 'success');
    }


    public function UserChangePassword() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.profile.password', compact("userData"));
    }

    public function UserUpdatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $this->redirectToUserProfile("Old Password doesn't match!", 'error');
            return back();
        }

        User::whereId(auth()->user()->id) -> update([
            'password' => Hash::make($request->new_password)
        ]);

        Auth::logout();
        $this->redirectToUserProfile("Password changed successfully", 'success');
        return back();
    }

    // private function
    private function userProfileValidationCheck($request) {
        $validationRules =  [
            'username' => 'required|max:50|unique:users,username,'.$request -> userId,
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];

        $validationMessage = [
            'username.required' => "Fill your username",
            'name.required' => 'Fill your name',
            'email.required' => "Fill your email",
            'phone.required' => "Fill your phone",
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }

    private function getuserProfileData($request) {
        return [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ];
    }

    private function redirectToUserProfile($message, $alertType) {
        $notification = array(
            'message' => $message,
            'alert-type' => $alertType,
        );
        return redirect()->back()->with($notification);
    }
}
