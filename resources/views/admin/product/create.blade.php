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
                                    <h3 class="title-5 m-b-35">Add New Product</h3>
                                    <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                         <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value='' selected disabled>--- please select ---</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="au-input au-input--full" type="text" name="name" placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Decription</label>
                                            <input class="au-input au-input--full" type="text" name="description" placeholder="Product Description">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="au-input au-input--full" type="number" name="price" placeholder="Product Price">
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <br>
                                            <input class="au-input au-input--full" type="file" name="image">
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Add Product</button>
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
