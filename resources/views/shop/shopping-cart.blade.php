@extends('layouts.master')

@section('content')
<div class="slider-area">
    <div class="slider-height d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('cart'))
<div class="fadeInDown my-5">
   <div class="row justify-content-center">
       <div class="col-sm-8 col-md-4">
        <h2 class="my-5" align="center" style="color: #084f5c!important; padding-left: 75px;">Your Cart</h2>
       </div>
   </div>
      <div class="row justify-content-center">

        @foreach($products as $product)
               <div class="col-sm-8 col-md-4">
                <div class="card" align="center">
                   <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Product: {{ $product['item']['name'] }}</strong></li>
                        <li class="list-group-item"><img class="img-thumbnail" src="{{ Storage::disk('s3')->url($product['item']['image'])}}" alt="Product Image" style="max-width:250px; max-height:200px;"></li>
                        <li class="list-group-item"><strong>Qty: {{ $product['qty'] }}</strong></li>
                        <li class="list-group-item"><strong>$: {{ number_format($product['price'], 2) }}</strong></li>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <span class="badge badge-pill badge-warning"><a type="button" href="{{ route('product.reduceByOne', $id = $product['item']['id'], ['id' => $product['item']['id'] ]) }}">Reduce By One</a></span>
                            </div>
                            <div class="col-md-6">
                                <span class="badge badge-pill badge-warning"><a  type="button" href="{{ route('product.remove', $id = $product['item']['id'], ['id' => $product['item']['id'] ]) }}">Remove All</a></span>
                            </div>
                        </div>
                    </ul>
                   </div>
                </div>
                </div>
               @endforeach
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-sm-8 col-md-4">
                <div class="card" align="center">
                    <div class="card-header">
                        <b><p class="font-weight-bold" style="color: #084f5c!important;">Total Price: {{ number_format($totalPrice, 2) }} $</p></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
        <div class="col-sm-8 col-md-4">
            <div class="card" align="center">
                @if(Auth::check())
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success btn/sm">Checkout</a>
                @else
                <p>To Chekout Order</p>
                <div class="btn-group justify-content-center" role="group" style="display:flex; flex-direction: row;">
                    <a href="{{ route('user.signin') }}" type="button" class="btn btn-info btn-sm">Login</a>
                   <span> or </span>
                    <a href="{{ route('user.signup') }}" type="button" class="btn btn-info btn-sm">Register</a>
                </div>
                @endif
            </div>
        </div>

   @else
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-4 my-5">
                    <h2 class="my-5" align="center" style="color: #084f5c!important;">No Items in Cart</h2>
                </div>
            </div>

       </div>

@endif
</div>
@endsection
