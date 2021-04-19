@extends('layouts.guest_2')
@section('meta-data')
    <title> Password Reset | Amlaen.com</title>
    <meta
            name="description"
            content="Amlaen is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Brading."
    />
    <meta
            name="Keywords"
            content="Amlaen password reset, Amlaen.com, Digital Marketing, Amlaen Digital Marketing Agency"
    />
@endsection
@section('style')
    .login-button {
    clear: both;
    margin-bottom: 15px;
    -webkit-box-shadow: 2px 5px 14px 1px #ccc;
    box-shadow: 2px 5px 14px 1px #ccc;
    }
    .login-button .btn {
    background-color: var(--secondary-color);
    border: 1px solid var(--secondary-color);
    padding: 10px 40px;
    border-radius: 0;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    }
    .login-button .btn:hover{
    box-shadow: 0 8px 25px -8px var(--secondary-color2);
    color: white;
    }
    .plk_08w009 a, .plk_08w009 span {
    color: var(--secondary-color2)
    }
@endsection
@section('form')
    <form method="POST" class="login-form"  action="{{ route('password.confirm') }}">
        @csrf
        <h1 class="h3 text-uppercase">Confirm your password</h1>
        @error('password')
        <div class="alert alert-danger w-100" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group kl23_3rte3">
            <input id="password"
                   type="password"
                   class="form-control"
                   name="password"
                   required
                   placeholder="Password"
                   autocomplete="current-password"
            >
        </div>
        <div class="login-button">
            <button type="submit" class="btn btn-lg btn-block text-uppercase">Confirm Password</button>
        </div>
        <div class="login-button">
            @if (Route::has('password.request'))
                <a class="btn btn-lg btn-block text-uppercase" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
    {{--    <form method="POST" action="{{ route('password.confirm') }}">--}}
    {{--        @csrf--}}
    {{--    --}}
    {{--        <div class="form-group row">--}}
    {{--            <label for="password"--}}
    {{--                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}
    {{--        --}}
    {{--            <div class="col-md-6">--}}
    {{--                @error('password')--}}
    {{--                <span class="invalid-feedback" roles="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                @enderror--}}
    {{--                <input id="password" type="password"--}}
    {{--                       class="form-control @error('password') is-invalid @enderror" name="password"--}}
    {{--                       required autocomplete="current-password">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    --}}
    {{--        <div class="form-group row mb-0">--}}
    {{--            <div class="col-md-8 offset-md-4">--}}
    {{--                <button type="submit" class="btn btn-primary">--}}
    {{--                    {{ __('Confirm Password') }}--}}
    {{--                </button>--}}
    {{--            --}}
    {{--                @if (Route::has('password.request'))--}}
    {{--                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                        {{ __('Forgot Your Password?') }}--}}
    {{--                    </a>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </form>--}}
@endsection
