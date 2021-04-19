{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }},--}}
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

{{--@extends('layouts.guest_2')--}}
{{--@section('style')--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <h1 class="h3 text-uppercase">Hi, {{ current_user()->name }}</h1>--}}
{{--    <p >Verify Your Email Address.</p>--}}
{{--    @if (session('resent'))--}}
{{--        <div class="alert alert-success w-100 alert-dismissible fade show" role="alert">--}}
{{--            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <form method="POST" action="{{ route('verification.resend') }}">--}}
{{--        @csrf--}}
{{--        <div class="login-button">--}}
{{--            <button type="submit" class="btn btn-lg btn-block text-uppercase">Resend verification link</button>--}}
{{--        </div>--}}
{{--        <div class="login-button">--}}
{{--            <a href="{{ route('logout') }}" class="btn btn-lg btn-block text-uppercase" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--          style="display: none;">--}}
{{--        @csrf--}}
{{--    </form>--}}
{{--@endsection--}}


@extends('layouts.guest_2')
@section('meta-data')
    <title>Verify Email - Amlaen.co</title>
    <meta
            name="description"
            content="Imc is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Branding."
    />
    <meta name="Keywords" content="Imc login, Imc.com, Digital Marketing, Imc Digital Marketing Agency"/>
    <!-- Custom Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}"/>
    <style>
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
    </style>
@endsection
@section('content')
    <div class="container-fluid login-page">
        <div class="container">
            <div class="row">
                <div class="fuh_674_hjkf">
                    <div class="main-title">
                        <h1>Verify Your Email Address.</h1>
                    </div>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="login-button">
                            <button type="submit" class="btn btn-lg btn-block text-uppercase">Resend verification link</button>
                        </div>
                        <div class="login-button">
                            <a href="{{ route('logout') }}" class="btn btn-lg btn-block text-uppercase" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                        </div>
                    </form>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


