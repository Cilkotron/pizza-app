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
                                <h3 class="title-5 m-b-35">ADMINS</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right float-right">
                                        <a href="{{ route('admin.create')}}">
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>Add Admin
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="table">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>role</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($admins as $key => $admin)
                                            <tr class="tr-shadow">
                                                <td>{{ $admin->name }}</td>
                                                <td>
                                                    <span class="block-email">{{ $admin->email }}</span>
                                                </td>
                                                <td>
                                                    <span class="status--process">{{ $admin->roles }}</span>
                                                </td>

                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('admin.edit', $admin->id ) }}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" style="display:none;" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="button"  onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $admin->id }}').submit();
                                                        }else {
                                                            event.preventDefault();
                                                                }">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
