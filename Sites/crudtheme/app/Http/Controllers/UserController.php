<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loginValidate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return back()->with('success', 'Success! You are logged in');
            }
            return back()->with('failed', 'Failed! Invalid password');
        }
        return back()->with('failed', 'Failed! Invalid email');
    }

    /**
     * Forgot password
     * @param NA
     * @return view
     */
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Validate token for forgot password
     * @param token
     * @return view
     */
    public function forgotPasswordValidate($token)
    {
        $user = User::where('token', $token)->where('is_verified', 0)->first();
        if ($user) {
            $email = $user->email;
            return view('auth.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    /**
     * Reset password
     * @param request
     * @return response
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('failed', 'Failed! email is not registered.');
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user['is_verified'] = 0;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token));

        if(Mail::failures() != 0) {
            return back()->with('success', 'Success! password reset link has been sent to your email');
        }
        return back()->with('failed', 'Failed! there is some issue with email provider');
    }

    /**
     * Change password
     * @param request
     * @return response
     */
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = '';
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Success! password has been changed');
        }
        return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
    }

    public function updateEditPassword(Request $request) {
        $this->validate($request, [
            'id' => 'required',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        ]);
        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = '';
            $user['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
            $user->save();
            if (auth()->user()->is_admin == 1){
                return redirect()->route('admindashboard')->with('success', 'Success! password has been changed');
            }else{
                return redirect()->route('dashboard')->with('success', 'Success! password has been changed');
            }
        }
        return redirect()->route('editprofile')->with('failed', 'Failed! something went wrong');
    }

    public function deleteProfile($id){
//        User::destroy($id);
        User::find($id)->delete();
        return redirect()->route('admindashboard',compact('id'))->with('success', 'User Sucessfully deleted...');
    }

}
