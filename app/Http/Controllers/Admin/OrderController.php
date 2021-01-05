<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderByRaw("status = 'new' DESC")
                 ->orderByRaw("status = 'taked' DESC")
                 ->orderByRaw("status = 'delivered' DESC")
                 ->get();
        $orders->transform(function($order, $key) {
            $order->cart =  json_decode($order->cart);
                return $order;
        });
        return view('admin.order.index', compact('orders', $orders));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $order = Order::find($id);
       $order->cart = json_decode($order->cart);
       return view('admin.order.edit',  compact('order'));
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

        $order = Order::find($id);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        // $order->cart = $request->cart;
        $order->status = $request->status;
        $order->save();
        Toastr::success('Order Successefully Updated!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        Toastr::success('Order Successefully Deleted!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }
}
