@extends('layouts.app')

@section('page-title', 'Social')
@section('module', 'Social')

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
                <h5 class="m-0">Social</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('studio.social.save') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" name="facebook_link" value="{{ old('facebook_link') ?: auth()->user()->facebook_link }}" id="facebook_link" placeholder="Enter facebook_link">
                        <div class="invalid-feedback">{{ $errors->first('facebook_link') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="pinrest_link">Pinrest Link</label>
                        <input type="text" class="form-control {{ $errors->has('pinrest_link') ? 'is-invalid' : '' }}" name="pinrest_link" value="{{ old('pinrest_link') ?: auth()->user()->pinrest_link }}" id="pinrest_link" placeholder="Enter pinrest_link">
                        <div class="invalid-feedback">{{ $errors->first('pinrest_link') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="text" class="form-control {{ $errors->has('instagram_link') ? 'is-invalid' : '' }}" name="instagram_link" value="{{ old('instagram_link') ?: auth()->user()->instagram_link }}" id="instagram_link" placeholder="Enter instagram_link">
                        <div class="invalid-feedback">{{ $errors->first('instagram_link') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" name="website" value="{{ old('website') ?: auth()->user()->website }}" id="website" placeholder="Enter your website">
                        <div class="invalid-feedback">{{ $errors->first('website') }}</div>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop