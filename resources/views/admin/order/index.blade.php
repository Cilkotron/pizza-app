@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-container">
            @include('partials.desktop-header')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">ORDERS</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                 <th>Address</th>
                                                 <th>Phone</th>
                                                 <th>Status</th>
                                                 <th>Cart Items</th>
                                                 <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($orders)
                                          @foreach($orders as $key => $order)
                                            <tr class="tr-shadow">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <span class="block-email">{{ $order->name }}</span>
                                                </td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>
                                                    @if($order->status == 'new')
                                                    <span class="badge badge-danger">{{ $order->status }}</span>
                                                    @elseif($order->status == 'taked')
                                                    <span class="badge badge-warning">{{ $order->status }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $order->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach($order->cart->items as $item )
                                                    <span>item: {{ $item->item->name }}, qty: {{ $item->qty}}, price: {{$item->price}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('order.edit', $order->id ) }}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <form id="delete-form-{{ $order->id }}" action="{{ route('order.destroy', $order->id) }}" style="display:none;" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="button"  onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $order->id }}').submit();
                                                        }else {
                                                            event.preventDefault();
                                                                }">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                          @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
@push('scripts')
    <script  type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script  type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
