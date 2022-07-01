<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;
//        $user->token = $token->token;
        return response()->json(['status'=>1,'message'=>'Register Success','token' => $token], 200);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('auth_token')->accessToken;
            return response()->json(['status'=>1,'message'=>'Login Success','data' => auth()->user(),'token' => [
                'token' => $token,
                'type' => 'Bearer'
            ],], 200);
        } else {
            return response()->json(['status'=>0,'message'=>'Failed','error' => 'Unauthorised'], 401);
        }
    }
}
