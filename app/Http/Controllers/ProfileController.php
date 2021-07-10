<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageStore;

    public function profile()
    {
        try {
            return view('profile.profile');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    public function password()
    {
        try {
            return view('profile.password');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    public function profileUpdate(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'phone' => 'required',
            ]);

            $user = auth()->user();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $request->image = $this->saveImage('user-'.uniqid().'.png',$request->image,'uploads/image/',$user->image);
            $user->image = $request->image;
            $user->save();
            Toastr::success('Profile Successfully Updated :)','success');

            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    public function updatePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->validate($request, [
                'old_password' => 'required',
                'password' => 'required|confirmed|min:8',
            ]);

            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->old_password, $hashedPassword)) {
                if (!Hash::check($request->password, $hashedPassword)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Toastr::success('Password Changed Successfully','success');
                    Auth::logout();
                    return redirect()->route('login');
                } else {
                    Toastr::error('New Password Cannot be same as the Old one', 'error');
                    return back();
                }
            } else {
                Toastr::error('Old Password Doesnt Match', 'error');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }

    }
}
