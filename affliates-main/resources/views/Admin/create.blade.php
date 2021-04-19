@extends ('Admin.layouts.app')
@section('style')
	<style type="text/css">
        .new-form-container .tab-content form .form-control {
            height: 36px;
            font-size: 13px;
            border-radius: 0;
        }

        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
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

        .form-group {
            margin-bottom: 1.5rem;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="new-form-container row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 pl-0">
			<h1>Create Admin</h1>
			<div class="tab-content">
				<div>
					<div class="card">
						<div class="card-content">
							<div class="card-body">
								<div>
									<form method="POST" action="{{ route('admins.store') }}">
										@csrf
										<div class="row mt-1">
											@if($errors->any())
												@foreach ($errors->all() as $error)
													<div class="alert alert-danger w-100 alert-dismissible fade show" role="alert">
														{{ $error }}
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												@endforeach
											@endif
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<div class="forms-control">
														<label>User Name</label>
														<input type="text"
															   id="username"
															   name="username"
															   placeholder="User Name"
															   value="{{ old('username') }}"
															   required class="form-control"/>
														<div class="help-block"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="forms-control">
														<label>Email Address</label>
														<input type="email"
															   id="email"
															   name="email"
															   placeholder="Email"
															   value="{{ old('email') }}"
															   required class="form-control"/>
														<div class="help-block"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="forms-control">
														<label>Password</label>
														<input type="password"
															   id="password"
															   name="password"
															   placeholder="Password"
															   required class="form-control"/>
														<div class="help-block"></div>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<div class="forms-control">
														<label>Full Name</label>
														<input type="text"
															   id="name"
															   name="name"
															   placeholder="Full Name"
															   value="{{ old('name') }}"
															   required class="form-control"/>
														<div class="help-block"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="forms-control">
														<label>Confirm Password</label>
														<input type="password"
															   name="password_confirmation"
															   placeholder="Confirm Password"
															   required class="form-control"
														/>
														<div class="help-block"></div>
													</div>
												</div>
											
											</div>
											
											<div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
												<button type="submit" class="btn btn-primary mr-sm-2 mb-2">Create
												</button>
											</div>
										</div>
									</form>
									<!-- users edit Info form ends -->
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection