<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function userList(Request $request){
//        dd($request->all());
        $userslist = User::all();
        return view('auth.admin_users_list', compact('userslist'));

    }
    public function showAdminProfile($id){

        $showData = auth()->user()->id;
        $contactData = User::find($id);
        return view('auth.showprofile',compact('showData','contactData'));
    }
    public function adminDashboard()
    {

        if(Auth::check()){
            $showAdminData = auth()->user()->id;
            return view('auth.admin_dashboard',compact('showAdminData'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
