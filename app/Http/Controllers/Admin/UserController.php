<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('roles', 'user')->get();
        $orders = DB::table('orders')->get();
        $orders->transform(function($order, $key) {
            $order->cart =  json_decode($order->cart);
             return $order;
        });
        return view('admin.user.index', compact('users', $users, 'orders', $orders));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'min:8|nullable',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = !empty($request->password) ? Hash::make($request->password) : $user->password;
        $user->roles = $request->roles;
        $user->save();
        Toastr::success('User account updated!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        DB::table('orders')->where('user_id', $user->id)->delete();
        $user->delete();
        Toastr::success('User Account Successefully Deleted!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }


    public function getUserOrders($id) {
        $user = User::find($id);
        $orders = User::find($id)->orders;
            $orders->transform(function($order, $key) {
                $order->cart =  json_decode($order->cart);
                return $order;
            });
            return view('admin.user.orders', compact('orders', $orders, 'user', $user));
    }

}
