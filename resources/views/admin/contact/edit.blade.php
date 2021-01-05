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
                                    <h3 class="title-5 m-b-35">Edit Messsage</h3>
                                    <form action="{{ route('contact.update', $message->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="au-input au-input--full" type="text" name="name" value="{{ $message->name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="au-input au-input--full" type="email" name="email" value="{{ $message->email}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input class="au-input au-input--full" type="text" name="subject" value="{{ $message->subject }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="au-input au-input--full" name="message" readonly>{{ $message->message }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="au-input au-input--full" name="status" required>
                                                <option value="new" @if (old('type', $message->status) == 'new') selected @endif >New</option>
                                                <option value="answered" @if (old('type', $message->status) == 'answered') selected @endif>Answered</option>
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
