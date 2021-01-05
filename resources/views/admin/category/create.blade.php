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
                                    <h3 class="title-5 m-b-35">Add New Category</h3>
                                    <form action="{{ route('category.store')}}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input class="au-input au-input--full" type="text" name="name" placeholder="Category Name">
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Add Category</button>
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
