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
<div class="wrapper fadeInDown">
    <div id="formContent" class="mb-5">
            <h2 class="mt-5" align="center" style="color: #084f5c!important;">Checkout</h2>
            <h5 align="center" style="color: #084f5c!important;">Your Total: {{ number_format($total,2) }} $</h5>
        <form action="{{ route('checkout') }}" method="post" class="clearfix mt-5" id="checkout-form">
            @csrf
            <div class="col-md-12">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-12">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control"  placeholder="" required>
            </div>
            <div class="col-md-12">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control"  placeholder="" required>
            </div>
            <div class="d-flex justify-content-end" style="padding: 30px 20px 20px 20px;">
                <button class="btn btn-success" type="submit" style="display:block; margin: 0 auto;">
                Buy Now
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
