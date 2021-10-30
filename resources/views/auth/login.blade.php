@extends('layouts.app')

@section('content')
<div class="col-md-5 mt-5">
<h1 class="text-center py-5">Contacts Manager</h1>
    <div class="card shadow-sm">
        <div class="card-header bg-info">
            <h3 class="text-center"> {{__('Login') }}</h3>

            </div>

        <div class="card-body py-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row justify-content-center">
                    <div class="col-md-10   ">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" placeholder="user@domain.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-10">
                        <label for="password" class="">{{ __('Password') }}</label>
                        <input id="password" placeholder="*****" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-info btn-lg shadow-sm">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
