@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <div class="page-container">
            @include('partials.desktop-header')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row justify-content-center my-5">
                            <div class="col-md-8">
                                <div class="login-form">
                                    <h3 class="title-5 m-b-35">Edit Order</h3>
                                    <form action="{{ route('order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="au-input au-input--full" type="text" name="name" value="{{ $order->name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Adress</label>
                                            <input class="au-input au-input--full" type="text" name="address" value="{{ $order->address}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="au-input au-input--full" type="text" name="phone" value="{{ $order->phone }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Cart Content</label>
                                              @foreach($order->cart->items as $item )
                                                <input class="au-input au-input--full" type="text" value="{{ $item->item->name }} {{ $item->qty }}" readonly>
                                             @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="au-input au-input--full" name="status" required>
                                                <option value="new" @if (old('type', $order->status) == 'new') selected @endif >New</option>
                                                <option value="taked" @if (old('type', $order->status) == 'taked') selected @endif>Taked</option>
                                                <option value="delivered" @if (old('type', $order->status) == 'delivered') selected @endif>Delivered</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection
