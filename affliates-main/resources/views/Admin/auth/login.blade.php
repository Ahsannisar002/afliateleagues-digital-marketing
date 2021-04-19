@extends('layouts.guest_2')
@section('meta-data')
	<title>Login - affliatesleagues.com</title>
	<meta
			name="description"
			content="affliatesleagues.com is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Branding."
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
					<form autocomplete="off" method="POST" class="login-form" action="{{ '/admin/login' }}">
						@csrf
						<h1 class="h3 text-uppercase">Admin Login</h1>
						@if($errors->any())
							@foreach ($errors->all() as $error)
								<div class="alert alert-danger w-100" role="alert">
									{{ $error }}
								</div>
							@endforeach
						@endif
						@if(Session::has('error_message'))
							<div class="alert alert-danger w-100" role="alert">
								{{ Session::get('error_message') }}
							</div>
						@endif
						<div class="form-group emi_j4gk">
							<input
									type="text"
									id="email"
									name="email"
									placeholder="Email"
									required="required"
									value="{{ old('email') }}"
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
						</div>
						<div class="buttons">
							<div class="umaoi">
								<button type="submit" class="admin-btn btn-lg btn-block text-uppercase">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection