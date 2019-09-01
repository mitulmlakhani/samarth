@extends('layouts.auth')

@section('page-title', __('Reset Password'))

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Reset Password') }}</p>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('distributor.password.email') }}" novalidate>
            @csrf
            <div class="form-group has-feedback">
                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-flat">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection