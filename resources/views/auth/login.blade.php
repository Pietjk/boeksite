@extends('layouts.app')

@section('content')
<div class="container login-container">
    <div class="panel is-primary">
        <div class="panel-heading"><p>Login</p></div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="panel-block">
                <div class="columns is-multiline is-fullwidth">
                    <div class="column is-12">
                        <label for="email" class="label"><p>E-Mail Address</p></label>
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="column is-12">
                        <label for="password" class="label"><p>Password</p></label>
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="column is-12">
                        <button type="submit" class="button is-outlined is-primary is-fullwidth">
                            {{ __('Login') }}
                        </button>
    
                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
                
            
                

                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div> --}}

                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
