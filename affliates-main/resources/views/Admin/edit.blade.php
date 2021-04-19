@extends ('Admin.layouts.app')
@section('style')
	<style type="text/css">

        .form-control {
            height: 36px;
            font-size: 13px;
            border-radius: 0;
        }
        label{
            font-size: 1rem;
        }
        .users-edit{
            font-size: 13px !important;
        }
        .btn-primary {
            border-color: #FF9F43 !important;
            background-color: #FF9F43 !important;
            color: #FFF;
        }

        .btn-primary:hover {
            box-shadow: 0 0 15px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }
        .new-form-container .tab-content {
            padding: 36px 30px;
        }

        .new-form-container {
            background-color: #ffffff;
            -webkit-box-shadow: 8px 5px 17px -7px #ccc;
            box-shadow: 8px 5px 17px -7px #ccc;
        }

        .new-form-container h1 {
            margin-left: 0;
            margin-bottom: 0;
            text-align: center;
            background-color: #00a5d4;
            color: #fff;
            font-size: 38px;
            padding: 16px 0 15px;
            position: relative;
        }

        .new-form-container h1:after {
            display: block;
            content: "";
            height: 6px;
            background-color: #FF9F43;
            width: inherit;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            bottom: 0;
        }
        .nav.nav-tabs {
            border: none;
            margin-bottom: 1rem;
            border-radius: 0;
        }

        .nav.nav-tabs,
        .nav.nav-tabs .nav-item {
            position: relative;
        }

        .nav.nav-tabs .nav-item .nav-link {
            color: #626262;
            font-size: .95rem;
            border: none;
            min-width: auto;
            font-weight: 450;
            padding: .61rem .635rem;
            border-radius: 0;
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            position: relative;
            color: #7367F0;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
            background-color: transparent;
        }

        .nav.nav-tabs .nav-item .nav-link.active:after {
            content: attr(data-before);
            height: 2px;
            width: 100%;
            left: 0;
            position: absolute;
            bottom: 0;
            top: 100%;
            background: -webkit-linear-gradient(60deg, #7367F0, rgba(115, 103, 240, .5)) !important;
            background: linear-gradient(30deg, #7367F0, rgba(115, 103, 240, .5)) !important;
            box-shadow: 0 0 8px 0 rgba(115, 103, 240, .5) !important;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
            -webkit-transition: all .2s linear;
            transition: all .2s linear;
        }

        .btn-primary {
            border-color: #FF9F43 !important;
            background-color: #FF9F43 !important;
            color: #FFF;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }
        .new-form-container .tab-content {
            padding: 36px 30px;
        }

        .new-form-container {
            background-color: #ffffff;
            -webkit-box-shadow: 8px 5px 17px -7px #ccc;
            box-shadow: 8px 5px 17px -7px #ccc;
        }

        .new-form-container .nav-tabs.nav {
            padding: 1.5em 1.5em 0 1.5em;
        }

        .new-form-container .tab-content form .btn {
            background-color: #FF9F43;
            border: 1px solid #FF9F43;
            color: #fff;
            text-transform: capitalize;
            margin: 0 auto;
            -webkit-box-shadow: 0 1px 12px 4px hsla(240, 7%, 85%, .6);
            box-shadow: 0 1px 12px 4px hsla(240, 7%, 85%, .6);
        }

        .new-form-container .tab-content form .btn:hover {
            box-shadow: 0 0 15px #FF9F43;
            transition: all 0.2s;
            color: #fff;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="new-form-container">
				<h1>Edit Admin</h1>
				<ul role="tablist" class="nav nav-tabs">
					<li class="nav-item">
						<a href="#transfer-balance" role="tab" data-toggle="tab" class="nav-link active"
						   aria-selected="true">
							<i class="fal fa-address-card mr-2"></i>
							Profile
						</a>
					</li>
					<li class="nav-item">
						<a href="#history" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">
							<i class="fal fa-handshake mr-2"></i>MemberShip
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" id="transfer-balance" class="tab-pane fade in active show">
						<div>
							<!-- users edit media object start -->
							<div class="media mb-4 d-flex align-items-center">
								<a class="mr-3" href="#">
									<img src="@if($admin->user_file){{ asset('storage/'.$admin->user_file) }}@else{{ 'https://ui-avatars.com/api/?size=128&background=645bd3&color=fff&name=' .  $admin->name }}@endif"
										 alt="users avatar"
										 class="users-avatar-shadow rounded-circle" height="90" width="90">
								</a>
								<div class="media-body mt-50">
									<h4 class="media-heading">{{ $admin->name }}</h4>
								</div>
							</div>
							<!-- users edit media object ends -->
							<!-- users edit Info form start -->
							<form method="POST" action="{{ route('admins.update', $admin->id) }}">
								@csrf
								@method('PUT')
								
								<div class="row mt-1">
									@if($errors->any())
										@foreach ($errors->all() as $error)
											{{! toast($error, 'error') }}
										@endforeach
									@endif
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<div class="forms-control">
												<label>Full Name</label>
												<input type="text"
													   class="form-control @error('name') is-invalid @enderror"
													   name="name"
													   placeholder="Full Name"
													   value="@if($admin->name !== null){{ $admin->name }}@else{{ old('name') }}@endif"
												/>
												<div class="help-block"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="forms-control">
												<label>Status</label>
												<select name="status" id="status" class="form-control">
													<option value="0"@if ($admin->status === 0) selected @endif>InActive</option>
													<option value="1"@if ($admin->status === 1) selected @endif>Active</option>
													<option value="2"@if ($admin->status === 2) selected @endif>Suspended</option>
													<option value="3"@if ($admin->status === 3) selected @endif>Banned</option>
												</select>
												<div class="help-block"></div>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<div class="forms-control">
												<label>User Name</label>
												<input type="text"
													   class="form-control @error('username') is-invalid @enderror"
													   name="username"
													   placeholder="User Name"
													   value="@if($admin->username !== null){{ $admin->username }}@else{{ old('username') }}@endif"
												/>
												<div class="help-block"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="forms-control">
												<label>Password</label>
												<input type="text"
													   class="form-control @error('password') is-invalid @enderror"
													   name="password"
													   placeholder="Password"
													   value="{{ old('password') }}"
												/>
												<div class="help-block"></div>
											</div>
										</div>
									</div>
									
									<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
										<button type="submit" class="btn btn-primary">Update
										</button>
									</div>
								</div>
							</form>
							<!-- users edit Info form ends -->
						</div>
					</div>
					<div role="tabpanel" id="history" class="tab-pane fade">
					
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection