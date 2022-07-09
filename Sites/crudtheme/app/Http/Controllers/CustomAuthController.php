<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (auth()->user()->is_admin == 1) {
                $loginAdmin = auth()->user()->id;
                return redirect()->route('admin',compact('loginAdmin'))
                    ->withSuccess('Admin Dashboard Signed In');
            } else {
                return redirect()->intended('dashboard')
                    ->withSuccess('Signed in');
            }
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }


    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
            'city' => 'required|min:3',
        ]);
        $data = $request->all();
        $userdata = $this->create($data);
        Auth::loginUsingId($userdata->id);
        $showDisplayData = auth()->user()->id;
            return view("auth.dashboard",compact('showDisplayData'))->withSuccess('You have signed-in');
    }

    public function addNewUserRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
            'city' => 'required|min:3',
        ]);
        $data = $request->all();
        $userdata = $this->create($data);
        Auth::loginUsingId($userdata->id);
        session()->flash(
            'feedback', 'Your User was successfully Added.'
        );
        return redirect()->route('userslist');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'city' => $data['city'],
            'token' => $data['_token'],
        ]);
    }


    public function dashboard()
    {
        $showDisplayData = auth()->user()->id;
        if (Auth::check()) {
            return view('auth.dashboard',compact('showDisplayData'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function adminHome()
    {
        $showAdminData = auth()->user()->id;
        return view('auth.admin_dashboard',compact('showAdminData'));
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function edit($id)
    {
        $contactData = User::find($id);
        return view('auth.editprofile',compact('contactData'));
    }

    public function editProfile(Request $request,$id)
    {
        $contact_id = User::find($id);
        $request->validate([
            'id' => 'required',
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255',
            'phone' => 'required|min:10',
            'city' => 'required|min:3',
        ]);
        $user = Auth::user();
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->city = $request['city'];
            $user->save();
            session()->flash(
                'feedback', 'Your profile was successfully updated.'
            );
            if (auth()->user()->is_admin == 1){
                return redirect()->route('userslist');
            }else{
                return redirect()->route('dashboard');
            }
        }
    }
    public function addNewUser(){
        return view('auth.add_new_user');
    }
}
