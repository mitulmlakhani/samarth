@extends('layouts.auth')

@section('page-title', __('Reset Password'))

@section('content')
<div class="card">
    <div class="card-header">{{ __('Reset Password') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('distributor.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback">
                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                <input id="password" type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group has-feedback mb-0">
                <button type="submit" class="btn btn-primary btn-flat">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection