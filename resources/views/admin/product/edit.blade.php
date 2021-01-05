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
                                    <h3 class="title-5 m-b-35">Edit Product</h3>
                                    <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="au-input au-input--full form-control" name="category_id" required>
                                                @foreach($categories as $category)
                                                    @if($category->id == $product->category_id)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="au-input au-input--full" type="text" name="name" value="{{ $product->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input class="au-input au-input--full" type="text" name="description" value="{{ $product->description }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="au-input au-input--full" type="number" name="price" value="{{ $product->price }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <img class="img img-thumbnail my-3" src="{{ Storage::disk('s3')->url($product->image)}}" alt="Product Image" style="max-height: 200px; max-width: 250x;">
                                            <input class="au-input au-input--full" type="file" name="image">
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
