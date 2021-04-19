<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	@yield('title')
	<meta name="viewport"
		  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
	<meta name="description" content="">
	<link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/all.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Proza+Libre:ital,wght@1,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon"/>
	<link rel="apple-touch-icon"/>
	
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-16x16.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/img/favicon-32x32.png")}}">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-3NXQKG34G8"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3NXQKG34G8');
	</script>
	@yield('style')
	@livewireStyles
</head>

<body>
<div id="ni-09" class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-header header-shadow">
		<div class="app-header__logo">
			<div class="logo-src">
				<h2>Affliates</h2>
			</div>
			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
							data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
					</button>
				</div>
			</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
				</button>
			</div>
		</div>
		<div class="app-header__menu">
                <span>
                    <button type="button"
							class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fal fa-ellipsis-v"></i>
                        </span>
                    </button>
                </span>
		</div>
		<div class="app-header__content">
			<div class="app-header-right">
				<div class="header-btn-lg pr-0">
					<div class="widget-content p-0">
						<div class="widget-content-wrapper">
							<div class="widget-content-left header-user-info">
								<div class="widget-heading">
									{{ current_user()->name }}
								</div>
							</div>
							<div class="widget-content-left ml-3">
								<div class="btn-group">
									<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
									   class="p-0 btn d-flex align-items-center">
										<img width="42" height="42" class="rounded-circle"
											 src="{{ 'https://ui-avatars.com/api/?background=00a5d4&color=fff&name=' . current_user()->name }}"
											 alt="User Avatar">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="app-main">
		<div class="app-sidebar sidebar-shadow">
			<div class="app-header__logo">
				<div class="logo-src">
					<h2>Affliates</h2>
				</div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
								data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
                    <span>
                        <button type="button"
								class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fal fa-ellipsis-v"></i>
                            </span>
                        </button>
                    </span>
			</div>
			<div class="scrollbar-sidebar">
				<div class="app-sidebar__inner">
					<ul class="vertical-nav-menu">
						<li>
							<a href="{{ url('/dashboard') }}"
							   class="{{ request()->path() === 'dashboard' ? 'mm-active' : '' }}">
								<i class="metismenu-icon fal fa-tachometer-alt-average"></i>
								Dashboard
							</a>
						</li>
						<li class="{{ request()->is('purchase*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-shopping-basket"></i>
								Purchase
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('membership.create') }}"
									   class="mb-0 {{ request()->path() === 'purchase/package' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Package
									</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="{{ url('/profile') }}"
							   class="{{ request()->path() === 'profile' ? 'mm-active' : '' }}">
								<i class="metismenu-icon fal fa-address-card"></i>
								Profile
							</a>
						</li>
						<li class="@if (request()->is('transactions') || request()->is('withdraw'))
								mm-active
								@else
						
						@endif"
						>
							<a href="#">
								<i class="metismenu-icon fal fa-usd-circle"></i>
								Transactions
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ url('/transactions') }}"
									   class="{{ request()->path() === 'transactions' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Transactions
									</a>
								</li>
								<li>
									<a href="{{ url('/withdraw')}}"
									   class="{{ request()->path() === 'withdraw' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Withdraw
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ url('/courses') }}"
							   class="{{ request()->path() === 'courses' ? 'mm-active' : '' }}">
								<i class="metismenu-icon fal fa-book"></i>
								Courses
							</a>
						</li>
						<li class="{{ request()->is('network*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-users"></i>
								Network
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{url('/network/direct-referrals')}}"
									   class="{{ request()->path() === 'network/direct-referrals' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Direct Referrals
									</a>
								</li>
								<li>
									<a href="{{url('/network/tree')}}"
									   class="{{ request()->path() === 'network/tree' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Network Tree
									</a>
								</li>
								<li>
									<a href="{{('/network/referral-link')}}"
									   class="mb-0 {{ request()->path() === 'network/referral-link' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Referral Link
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ request()->is('settings*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-cog"></i>Settings
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="/settings/change-password"
									   class="{{ request()->path() === 'settings/change-password' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Change Password
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ route('logout') }}"
							   class="{{ request()->path() === 'logout' ? 'mm-active' : '' }}"
							   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<i class="metismenu-icon fal fa-power-off"></i>Logout
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST"
								  style="display: none;">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="app-main__outer">
			<div class="app-main__inner">
				@yield('content')
			</div>
		</div>
	</div>
</div>
@include('sweetalert::alert')
</body>
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@yield('page-script')
@livewireScripts
</html>
