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
<div class="fadeInDown" align="center">
    <h2 class="mb-5" style="color: #084f5c!important;">Your Orders</h2>
    <div class="row justify-content-center">
        @foreach($orders as $key => $order)
            <div class="col-md-4">
                <div class="card mb-5">
                    <div class="card-header">
                    <span>{{ $key + 1 }}</span>
                    <br>
                    <strong class="text-uppercase">Total Price: {{ number_format($order->cart->totalPrice, 2) }} $</strong>
                    <br>
                    <span class="font-weight-light">{{ $order->created_at }}</span>
                    </div>
                    <div class="card-body">
                    @foreach($order->cart->items as $item )
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="font-weight-bold">{{ $item->item->name }}</span>
                            <span class="font-weight-normal">{{ number_format($item->price, 2) }} $ ( {{ $item->qty }} Unit) </span>
                        </li>

                    </ul>
                    @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

