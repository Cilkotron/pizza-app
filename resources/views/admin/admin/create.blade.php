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
                                    <h3 class="title-5 m-b-35">Create Admin Account</h3>
                                    <form action="{{ route('admin.store')}}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Add Admin</button>
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
