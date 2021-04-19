<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	@yield('meta')
	<meta name="viewport"
		  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
	<link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Proza+Libre:ital,wght@1,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-16x16.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/img/favicon-32x32.png")}}">
	@yield('style')
	@livewireStyles
</head>

<body>
<div id="ni-09"
	 class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
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
									{{ current_admin()->name ?? 'Umair' }}
								</div>
								<div class="widget-subheading">
									@if (current_admin()->getRoleNames()[0] == 'super-admin')
										{{ 'Super Admin' }}
									@elseif (current_admin()->getRoleNames()[0] == 'admin')
										{{ 'Admin' }}
									@endif
								</div>
							</div>
							<div class="widget-content-left ml-3">
								<div class="btn-group">
									<a class="p-0 btn d-flex align-items-center">
										<img width="42" height="42" class="rounded-circle"
											 src="{{ 'https://ui-avatars.com/api/?background=00a5d4&color=fff&name=' . current_admin()->name }}"
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
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
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
						@role('super-admin', 'admin')
						<li>
							<a href="{{ url('/admin/dashboard') }}"
							   class="{{ request()->path() === 'admin/dashboard' ? 'mm-active' : '' }}">
								<i class="metismenu-icon fal fa-tachometer-alt-average"></i>
								Dashboard
							</a>
						</li>
						@endrole
						<li class="{{ request()->is('admin/resources*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-th-large"></i>
								Resources
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								
								@role('super-admin', 'admin')
								<li>
									<a href="{{ route('admins.index') }}"
									   class="mb-0 {{ request()->is('admin/resources/admins*') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Admins
									</a>
								</li>
								@endrole
								<li>
									<a href="{{ route('users.index') }}"
									   class="mb-0 {{ request()->is('admin/resources/users*') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Users
									</a>
								</li>
							</ul>
						</li>
						@role('super-admin', 'admin')
						<li class="{{ request()->is('admin/memberships*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-user-circle"></i>
								Packages
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('memberships.index') }}"
									   class="mb-0 {{ request()->is('admin/memberships') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Index
									</a>
								</li>
								<li>
									<a href="{{ route('memberships.pending') }}"
									   class="mb-0 {{ request()->is('admin/memberships/pending') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Pending
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ request()->is('admin/withdraws*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-money-check-alt"></i>
								Withdraws
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('withdraws.index') }}"
									   class="mb-0 {{ request()->is('admin/withdraws') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Index
									</a>
								</li>
								<li>
									<a href="{{ route('withdraws.pending') }}"
									   class="mb-0 {{ request()->is('admin/withdraws/pending') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Pending
									</a>
								</li>
							</ul>
						</li>
						<li class="@if(request()->is('admin/transactions')) mm-active @elseif(request()->is('admin/create-points')) mm-active @endif">
							<a href="#">
								<i class="metismenu-icon fal fa-usd-circle"></i>
								Transactions
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ url('/admin/transactions') }}"
									   class="{{ request()->path() === 'admin/transactions' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Transactions
									</a>
								</li>
							</ul>
						</li>
						@endrole
						<li class="{{ request()->is('admin/payment-gateway*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-th-large"></i>
								Gateways
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('payment-gateways.index') }}"
									   class="mb-0 {{ request()->is('admin/payment-gateways') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Index
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ request()->is('admin/roles*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-user-tag"></i>
								Roles
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('roles.index') }}"
									   class="mb-0 {{ request()->is('admin/roles*') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Index
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ request()->is('admin/permissions*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-user-lock"></i>
								Permissions
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('permissions.index') }}"
									   class="mb-0 {{ request()->is('admin/permissions*') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Index
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ request()->is('admin/titles*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-text"></i>
								Titles
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('titles.index') }}"
									   class="mb-0 {{ request()->is('admin/titles*') ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Index
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ request()->is('admin/settings*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-cog"></i>Settings
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="/admin/settings/change-password"
									   class="{{ request()->path() === 'admin/settings/change-password' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Change Password
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ route('admins.logout') }}"
							   class="{{ request()->path() === 'admin/logout' ? 'mm-active' : '' }}"
							   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<i class="metismenu-icon fal fa-power-off"></i>Logout
							</a>
							<form id="logout-form" action="{{ route('admins.logout') }}" method="POST"
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
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
@yield('page-script')
@livewireScripts
</html>
