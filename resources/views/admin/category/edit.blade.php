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
                                    <h3 class="title-5 m-b-35">Edit Category</h3>
                                    <form action="{{ route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label>Category </label>
                                            <input class="au-input au-input--full" type="text" name="name" value="{{ $category->name }}">
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
