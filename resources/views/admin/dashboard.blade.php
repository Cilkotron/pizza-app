@extends('layouts.admin')


@section('content')
<div class="page-wrapper">

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        @include('partials.desktop-header')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h3 class="title-5 m-b-35">DASHBOARD</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-6 col-lg-6 mb-3">
                            <a href="{{ route('order.index') }}">
                                @if($newOrders)
                                <button type="button" class="button121" title="New Orders">{{ $newOrders }} New Order</button>
                                @endif
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <a href="{{ route('contact.index') }}">
                                @if($newMessages)
                                <button type="button" class="button121" title="New Messages">{{ $newMessages }} New Message</button>
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                        <div class="text">
                                            <h2>{{ $userCount }}</h2>
                                            <span>Users</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c2">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-badge-check"></i>
                                        </div>
                                        <div class="text">
                                            <h2>{{ $productCount }}</h2>
                                            <span>Products</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c3">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                        <div class="text">
                                            <h2>{{ $orderCount }}</h2>
                                            <span>Orders</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c4">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                        <div class="text">
                                            <?php $sum = 0; ?>
                                            @if($orders)
                                                @foreach($orders as $order)
                                                    <?php $sum += $order->cart->totalPrice; ?>
                                                @endforeach
                                            @endif
                                            <h2>$ {{ number_format($sum, 2) }}</h2>
                                            <span>Earnings</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>



@endsection
