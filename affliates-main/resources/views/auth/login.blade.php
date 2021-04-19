@extends('layouts.guest_2')
@section('meta-data')
	<title>Login - affliatesleagues.com</title>
	<meta
			name="description"
			content="affliatesleagues is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Branding."
	/>
	<meta name="Keywords" content="affliatesleagues login, affliatesleagues.com, Digital Marketing, affliatesleagues Digital Marketing Agency"/>
	<!-- Custom Css File -->
	<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}"/>
@endsection
@section('content')
	<div class="container-fluid login-page">
		<div class="container">
			<div class="row">
				<div class="fuh_674_hjkf">
					<div class="main-title">
						<div class="logo__container"><img src="{{ asset('assets/img/logo.PNG') }}" alt="" class="logo">
						</div>
					</div>
					<form autocomplete="off" method="POST" class="login-form" action="{{ route('login') }}">
						@csrf
						<h1 class="h3 text-uppercase">Login to Your Account</h1>
						@if($errors->any())
							@foreach ($errors->all() as $error)
								<div class="alert alert-danger w-100 fade show" role="alert">
									{{ $error }}
								</div>
							@endforeach
						@endif
						<div class="form-group emi_j4gk">
							<input
									type="text"
									id="login"
									name="login"
									placeholder="Username Or Email"
									required="required"
									value="{{ old('username') ?: old('email') }}"
									autofocus="autofocus"
									class="form-control"
							/>
						</div>
						
						<div class="form-group kl23_3rte3">
							<input
									type="password"
									id="password"
									name="password"
									placeholder="Password"
									required="required"
									class="form-control"
							/>
						</div>
						<div class="plk_08w03">
							<div class="plk_08w009 pr">
								<a href="{{ url('/') }}">Home</a>
							</div>
							<div class="plk_09820b text-right">
								<a href="{{ route('password.request') }}">Forgot Password?</a>
							</div>
						</div>
						<div class="co-12">
							<div class="d-flex justify-content-between align-items-center">
								<div class="plk_09nkj34">
									<button type="submit" class="btn text-uppercase">
										Login
									</button>
								</div>
								<div class="re-button">
									<a href="{{ url('register') }}" class="btn text-uppercase"
									>Register</a
									>
								</div>
							</div>
						</div>
						
{{--						<div class="buttons">--}}
{{--							<div class="plk_09nkj34">--}}
{{--								<button type="submit" class="btn text-uppercase">--}}
{{--									Login--}}
{{--								</button>--}}
{{--							</div>--}}
{{--							<div class="re-button">--}}
{{--								<a href="{{ url('register') }}" class="btn text-uppercase"--}}
{{--								>Register</a--}}
{{--								>--}}
{{--							</div>--}}
{{--						</div>--}}
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection