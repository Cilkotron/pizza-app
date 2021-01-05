<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = 'user';
        $user->save();
        Auth::login($user);
        Toastr::success('Account created!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('shop.index');
    }

    public function getSignin() {
        return view('user.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);

         if(Auth::attempt([
           'email' => $request->email,
           'password' => $request->password,
           'roles' => 'user',
            ])) {
                Toastr::success('Login success!', 'Success', ["positionClass" =>"toast-top-right"]);
                return redirect()->route('shop.index');

            } elseif(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'roles' => 'admin',
                 ])) {
                    Toastr::success('Login success!', 'Success', ["positionClass" =>"toast-top-right"]);
                    return redirect()->route('admin.dashboard');

            } elseif(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'roles' => 'full',
                 ])) {

                    Toastr::success('Login success!', 'Success', ["positionClass" =>"toast-top-right"]);
                    return redirect()->route('admin.dashboard');
             }
                Toastr::error('Invalid credentials!!', 'Error', ["positionClass" =>"toast-top-right"]);
                return redirect()->back();
    }

    public function getProfile() {
        $orders = Auth::user()->orders;
            $orders->transform(function($order, $key) {
                $order->cart =  json_decode($order->cart);
                return $order;
            });
            return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout () {
        Auth::logout();
        return redirect()->back();
    }

}
