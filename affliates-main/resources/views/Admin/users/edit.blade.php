@extends ('Admin.layouts.app')
@section('style')
	<style type="text/css">

        .form-control {
            height: 36px;
            font-size: 13px;
            border-radius: 0;
        }

        label {
            font-size: 1rem;
        }

        .users-edit {
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
            font-family: Lato-Bold, sans-serif;
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

        .content-area {
            min-height: 450px;
            padding: 40px 0;
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

        .tb-90 {
            table-layout: auto;
            width: 100%;
        }

        .tb-90 thead {
            background: #f1f2f7;
        }

        .tb-90 thead th {
            vertical-align: middle;
            font-weight: 600;
            color: #212529;
            border: 1px solid #e7e7e7;
        }

        .tb-90 tbody tr {
            vertical-align: middle;
        }

        .tb-90 tbody tr td {
            color: inherit;
            border: 1px solid #e7e7e7;
        }

        .inp-shadow {
            -webkit-box-shadow: 0 5px 5px 0 #ccc;
            box-shadow: 0 5px 5px 0 #ccc;
        }

        #history table.pincreate-history .btn {
            background-color: #FF9F43;
            border: 1px solid #FF9F43;
            color: #fff;
        }

        @media (max-width: 576px) {
            .amount-heading {
                background: url(assets/images/layer.png) repeat-x 0 0;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .purchase-pin-title {
                padding: 1em 1.3em 0 1.3em;
                color: #fff;
                font-size: 1.2rem;
                text-align: center;
            }

            .purchase-pin-ammount {
                color: #fff;
                text-align: center;
                font-size: 2rem;
                float: right;
                padding: 0;
            }
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="new-form-container">
				<h1>Edit User</h1>
				<ul role="tablist" class="nav nav-tabs">
					<li class="nav-item">
						<a href="#transfer-balance" role="tab" data-toggle="tab" class="nav-link active"
						   aria-selected="true">
							<i class="fal fa-address-card mr-2"></i>
							Profile
						</a>
					</li>
					{{--					<li class="nav-item">--}}
					{{--						<a href="#history" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">--}}
					{{--							<i class="fal fa-handshake mr-2"></i>MemberShip--}}
					{{--						</a>--}}
					{{--					</li>--}}
				</ul>
				<div class="tab-content">
					<div role="tabpanel" id="transfer-balance" class="tab-pane fade in active show">
						<div>
							<!-- users edit media object start -->
							<div class="media mb-4 d-flex align-items-center">
								<a class="mr-3" href="#">
									<img src="{{ 'https://ui-avatars.com/api/?size=256&background=645bd3&color=fff&name=' .  $user->name }}"
										 alt="users avatar"
										 class="users-avatar-shadow rounded-circle" height="90" width="90">
								</a>
								<div class="media-body mt-50">
									<h4 class="media-heading">{{ $user->name }}</h4>
								</div>
							</div>
							<!-- users edit media object ends -->
							<!-- users edit Info form start -->
							<form method="POST" action="{{ route('users.update', $user->id) }}">
								@csrf
								@method('PUT')
								
								<div class="row mt-1">
									@if($errors->any())
										@foreach ($errors->all() as $error)
											<div class="alert alert-danger w-100 alert-dismissible fade show"
												 role="alert">
												{{ $error }}
												<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										@endforeach
									@endif
										<div class="col-12 col-sm-6">
											@role('super-admin', 'admin')
											<div class="form-group">
												<div class="forms-control">
													<label>Sponsor</label>
													<input type="text"
														   class="form-control @error('name') is-invalid @enderror"
														   name="sponsor"
														   placeholder="Sponsor"
														   value="@if($user->sponsor !== null){{ $user->sponsor }}@else{{ old('sponsor') }}@endif"
														   @if (current_admin()->getRoleNames()[0] !== 'super-admin')
														   disabled
															@endif
													/>
													<div class="help-block"></div>
												</div>
											</div>
											<div class="form-group">
												<div class="forms-control">
													<label>User Name</label>
													<input type="text"
														   class="form-control @error('username') is-invalid @enderror"
														   name="username"
														   placeholder="User Name"
														   value="@if($user->username !== null){{ $user->username }}@else{{ old('username') }}@endif"
													/>
													<div class="help-block"></div>
												</div>
											</div>
											@endrole
											<div class="form-group">
												<div class="forms-control">
													<label>Full Name</label>
													<input type="text"
														   class="form-control @error('name') is-invalid @enderror"
														   name="name"
														   placeholder="Full Name"
														   value="@if($user->name !== null){{ $user->name }}@else{{ old('name') }}@endif"
													/>
													<div class="help-block"></div>
												</div>
											</div>
											<div class="form-group">
												<div class="forms-control">
													<label>Birth date</label>
													<input type="date"
														   class="form-control @error('date_of_birth') is-invalid @enderror"
														   name="date_of_birth"
														   placeholder="Birth date"
														   value="@if($user->date_of_birth !== null){{ $user->date_of_birth }}@else{{ old('date_of_birth') }} @endif"
													
													>
												</div>
											</div>
											<div class="form-group">
												<div class="forms-control">
													<label>Mobile</label>
													<input type="text"
														   class="form-control @error('phone') is-invalid @enderror"
														   name="phone"
														   placeholder="Mobile number here..."
														   value="@if($user->phone){{ 0 . $user->phone }}@else{{ old('phone') }} @endif"
													>
													<div class="help-block"></div>
												</div>
											</div>
											
											<div class="form-group">
												<label>Select Gender</label>
												<ul class="list-unstyled mb-0 pt-3">
													<li class="d-inline-block mr-2">
														<fieldset>
															<div class="vs-radio-con">
																<input class="custom-checkbox"
																	   type="radio"
																	   name="gender"
																	   @if($user->gender !== null)
																	   @if($user->gender === 'male'){{'checked'}}@else @endif
																	   @endif
																
																	   value="male">
																Male
															</div>
														</fieldset>
													</li>
													<li class="d-inline-block mr-2">
														<fieldset>
															<div class="vs-radio-con">
																<input type="radio"
																	   name="gender"
																	   @if($user->gender !== null)
																	   @if($user->gender === 'female'){{'checked'}}@else @endif
																	   @endif
																
																	   value="female">
																Female
															</div>
														</fieldset>
													</li>
													<li class="d-inline-block mr-2">
														<fieldset>
															<div class="vs-radio-con">
																<input type="radio"
																	   name="gender"
																	   @if($user->gender !== null)
																	   @if($user->gender === 'other'){{'checked'}}@else @endif
																	   @endif
																	   value="other">
																Other
															</div>
														</fieldset>
													</li>
												
												</ul>
											</div>
											<div class="form-group">
												<div class="forms-control">
													<label>Status</label>
													<select name="status" id="status" class="form-control">
														<option value="0"@if ($user->status === 0) selected @endif>InActive</option>
														<option value="1"@if ($user->status === 1) selected @endif>Active</option>
														<option value="2"@if ($user->status === 2) selected @endif>Suspended</option>
														<option value="3"@if ($user->status === 3) selected @endif>Banned</option>
													</select>
													<div class="help-block"></div>
												</div>
											</div>
										</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<div class="forms-control">
												<label>Address</label>
												<input type="text"
													   class="form-control @error('address') is-invalid @enderror"
													   name="address"
													   placeholder="Address Line 1"
													   value="@if($user->address !== null){{ $user->address }}@else{{ old('address') }} @endif"
												>
												<div class="help-block"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="forms-control">
												<label>City</label>
												<input type="text"
													   class="form-control @error('city') is-invalid @enderror"
													   name="city"
													   placeholder="City"
													   value="@if($user->city !== null){{ $user->city }}@else{{ old('city') }} @endif"
												>
												<div class="help-block"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="forms-control">
												<label>Postal code</label>
												<input type="text"
													   class="form-control @error('postalcode') is-invalid @enderror"
													   name="postalcode"
													   placeholder="Postal code"
													   value="@if($user->postalcode !== null){{ $user->postalcode }}@else{{ old('postalcode') }} @endif"
												>
												<div class="help-block"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="forms-control">
												<label>State</label>
												<input type="text"
													   class="form-control @error('state') is-invalid @enderror"
													   name="state"
													   placeholder="State"
													   value="@if($user->state !== null){{ $user->state }}@else{{ old('state') }} @endif"
												>
												<div class="help-block"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="forms-control">
												<label>Country</label>
												<input type="text"
													   class="form-control @error('country') is-invalid @enderror"
													   name="country"
													   placeholder="Country"
													   value="@if($user->country !== null){{ $user->country }}@else{{ old('country') }} @endif"
												>
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