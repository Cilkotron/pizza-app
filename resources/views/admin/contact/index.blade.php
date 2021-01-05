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
                                <h3 class="title-5 m-b-35">MESSAGES</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>subject</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>message</th>
                                                <th>status</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($messages)
                                          @foreach($messages as $key => $message)

                                            <tr class="tr-shadow">
                                                <td>{{ $key + 1 }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $message->subject }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $message->message }}</td>
                                                <td>
                                                    @if($message->status == 'new')
                                                    <span class="badge badge-danger">{{ $message->status }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $message->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                        <div class="table-data-feature">
                                                        <a href="{{ route('contact.edit', $message->id ) }}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <form id="delete-form-{{ $message->id }}" action="{{ route('contact.destroy', $message->id) }}" style="display:none;" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="button"  onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $message->id }}').submit();
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
