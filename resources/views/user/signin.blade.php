@extends('layouts.master')

@section('content')
<div class="slider-area">
    <div class="slider-height d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper fadeInDown">
  @if(count($errors) > 0)
            <div class="alert alert-danger">
            @foreach($errors as $e)
                <p>{{ $e}}</p>
            @endforeach
            </div>
    @endif
  <div id="formContent" class="mb-5">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <!-- <img src="" id="icon" alt="User Icon" /> -->
    </div>
    <h2 class="mt-5" align="center" style="color: #084f5c!important;">Login</h2>
    <!-- Login Form -->
    <form action="{{ route('user.signin') }}" method="post" class="clearfix mt-5">
      <div class="col-md-12">
        <label for="inputEmail"></label>
        <input type="email" name="email" id="email" class="form-control" id="inputEmail" placeholder="Enter your Email">
      </div>
      <div class="col-md-12">
        <label for="inputPassword"></label>
        <input type="password" name="password" id="password" autocomplete="on" class="form-control" id="inputPassword" placeholder="Enter Your Password">
      </div>
      <div class="d-flex justify-content-end" style="padding: 30px 20px 20px 20px;">
        <button class="btn btn-success" type="submit" style="display:block; margin: 0 auto;">
            <i class="fas fa-user-plus"></i>
           Login
        </button>
        {{ csrf_field() }}

      </div>
    </form>

  </div>
</div>
@endsection

