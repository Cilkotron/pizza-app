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
                                    <h3 class="title-5 m-b-35">Edit User Account</h3>
                                    <form action="{{ route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="au-input au-input--full" type="text" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="au-input au-input--full" name="roles" required>
                                                <option value="user" @if (old('type', $user->roles) == 'user') selected @endif >User</option>
                                                <option value="admin" @if (old('type', $user->roles) == 'admin') selected @endif >Admin</option>
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
