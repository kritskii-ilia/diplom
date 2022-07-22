<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function signup(Request $request){
        $userData = $request->all();
        $validator = Validator::make($userData,[
            'email' => 'required|unique:users|email:rfc,filter',
            'login' => 'required|unique:users',
            'password' => 'required'
        ]);
        if($validator->fails()) {
            return redirect(route('signup-page'))
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User();
        $user->login = $userData['login'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->role_id = 2;
        $user->balance = 0;
        $user->save();
        return redirect(route('main-page'));
    }
    public function login(Request $request)
    {
        $userInfo=$request->only('email','password');
        $validator= Validator::make($userInfo, [
            'email'=>'required|email:rfc,filter',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect(route('login-page'))
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt($userInfo)) {
            return redirect('/');
        }
        return redirect(route('login-page'))
            ->withErrors(['auth_error' => 'Email или пароль введены некорректно'])
            ->withInput();
    }
    public function profile(Request $request)
    {
        $userData = $request->all();
            $validator = Validator::make($userData, [
                'email' => Rule::unique('users')->where(function ($query) {
                    return $query->where('email');
                }),
                'login' => 'required',
                'password' => 'required'
            ]);
        if ($validator->fails()) {
            return redirect(route('profile-page'))
                ->withErrors($validator)
                ->withInput();
        }
        $user = Auth::user();
        $user->email = $userData['email'];
        $user->login = $userData['login'];
        $user->password = bcrypt($userData['password']);
        $user->save();
        return redirect(route('profile-page'));
    }
    public function api_register(Request $request){
        $data=$request->except('_token');
        $validator = Validator::make($data,[
            'email'=>'required|unique:users|email:rfc,filter',
            'password'=>'required',
//            'passwordc'=>'required',
            'login'=>'required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'error'=>[
                    'code'=>422,
                    'message'=>"Validation failed",
                    'errors'=>$validator->errors()
                ]
            ],422);
        }
        $user=new User();
        $user->login= $data['login'];
        $user->email= $data['email'];
        $user->password= bcrypt($data['password']);
        $user->save();
        return response()->json()->setStatusCode(204);
    }
    public function api_login(Request $request)
    {
        $userInfo=$request->only('email','password');

        $validator= Validator::make($userInfo, [
            'email'=>'required|email:rfc,filter',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => "Validation failed",
                    'errors' => $validator->errors()
                ]
            ], 422);
        }
        if (Auth::attempt($userInfo)) {
            return response()->json()->setStatusCode(204);
        }
    }
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
