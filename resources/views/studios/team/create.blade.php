@extends('layouts.admin')

@section('page-title', 'Create Team')
@section('module', 'Team')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Create Team</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('studio.team.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name" placeholder="Enter name">
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position" value="{{ old('position') }}" id="position" placeholder="Enter position">
                        <div class="invalid-feedback">{{ $errors->first('position') }}</div>
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