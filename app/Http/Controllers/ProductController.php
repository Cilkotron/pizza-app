<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\Product;
use App\User;
use App\Category;
use App\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getIndex()
      {

        $products = Product::all();
        $categories = Category::all();
         return view('shop.index', compact('products', 'categories'));
      }


      public function getAddToCart(Request $request, $id)
      {
         $product =  Product::find($id);
         $oldCart = session()->has('cart') ? session()->get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->add($product, $product->id);

         $request->session()->put('cart', $cart);
         Toastr::success('', 'Success', ["positionClass" =>"toast-top-right"]);
         return redirect()->route('shop.index');
      }

      public function getCart() {
        if(!session()->has('cart')) {
           return view('shop.shopping-cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getReduceByOne($id) {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        Toastr::success('', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('product.shoppingCart');

     }
     public function getRemoveItem($id) {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(!empty($cart->items)) {
           Session::put('cart', $cart);
        } else {
           Session::forget('cart');
        }
        Toastr::success('', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('product.shoppingCart');

     }

     public function getCheckout() {
        if(!session()->has('cart')) {
           return view('shop.shopping-cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
     }

     public function postCheckout(Request $request) {
        if(!session()->has('cart')) {
           return view('shop.shopping-cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

         $order = new Order();
         $order->cart = json_encode($cart);
         $order->address = $request->input('address');
         $order->name = $request->input('name');
         $order->phone = $request->input('phone');
         $order->status = 'new';

       Auth::user()->orders()->save($order);
       session()->forget('cart');
       Toastr::success('You have successfully ordered!', 'Success', ["positionClass" =>"toast-top-right"]);
       return redirect()->route('shop.index');
     }



}
