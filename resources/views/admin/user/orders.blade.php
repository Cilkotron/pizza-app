@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <div class="page-container">
            @include('partials.desktop-header')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <h3 class="title-5 m-b-35">{{ $user->name }} Orders</h3>
                    <div class="row">
                        @foreach($orders as $order)
                           <div class="col-md-4">
                            <div class="card border border-success">
                                <div class="card-header">
                                    <strong>{{ $order->name }}</strong>
                                    <strong class="card-title">total: $ {{ number_format( $order->cart->totalPrice, 2)}}</strong>
                                    <p>ordered: {{ $order->created_at }}</p>
                                </div>
                                <div class="card-body">
                                    @foreach($order->cart->items as $item )
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">{{ $item->item->name }}</span>
                                            <span class="font-weight-normal">$ {{ number_format($item->price, 2) }}, qty: {{ $item->qty }} </span>
                                        </li>

                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
