@extends('layouts.admin')

@section('page-title', 'Profile')
@section('module', 'Profile')

@section('content')
<div class="row">
    <div class="col-lg-12">

        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success ! {{ session('success') }}</strong> .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Profile</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('studio.profile.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') ?: auth()->user()->name }}" id="name" placeholder="Enter name">
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" name="mobile" value="{{ old('mobile') ?: auth()->user()->mobile }}" id="mobile" placeholder="Enter mobile">
                        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') ?: auth()->user()->email }}" id="email" placeholder="Enter email">
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address')  ?: auth()->user()->address }}" id="address" placeholder="Enter address">
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location" value="{{ old('location') ?: auth()->user()->location }}" id="location" placeholder="Latitude, Longitude (21.72, 72.21)">
                        <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Logo</label>
                        <input type="file" accept="image/*" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image" placeholder="Select image">
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        <br>
                        <img src="{{ url('storage/'. (auth()->user()->avatar ?: 'user_default.png')) }}" width="100" height="100" alt="">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop