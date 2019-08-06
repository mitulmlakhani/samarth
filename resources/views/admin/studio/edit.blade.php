@extends('layouts.admin')

@section('page-title', 'Edit Studio')
@section('module', 'Studio')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Edit Studio</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.studio.update', $id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') ?: $name }}" id="name" placeholder="Enter name">
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" id="mobile" name="mobile" value="{{ old('mobile') ?: $mobile }}" placeholder="Enter mobile">
                        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="validity">Email address</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') ?: $email }}" placeholder="Enter email">
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="validity">Membership Till</label>
                        <input type="date" class="form-control {{ $errors->has('validity') ? 'is-invalid' : '' }}" id="validity" name="validity" value="{{ old('validity') ?: $validity }}">
                        <div class="invalid-feedback">{{ $errors->first('validity') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="album_credit">Add Album Credit</label>
                        <input type="number" class="form-control {{ $errors->has('album_credit') ? 'is-invalid' : '' }}" id="album_credit" name="album_credit" value="{{ old('album_credit') ?: 0 }}">
                        <div class="invalid-feedback">{{ $errors->first('album_credit') }}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop