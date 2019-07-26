@extends('layouts.app')

@section('page-title', 'Create Portfolio')
@section('module', 'Portfolio')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Create Portfolio</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('studio.portfolio.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" id="title" placeholder="Enter title">
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" accept="image/*" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image" placeholder="Select image">
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop