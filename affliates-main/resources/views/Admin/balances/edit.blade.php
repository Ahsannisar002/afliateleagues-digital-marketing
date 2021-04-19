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
				<h1>Edit Balance</h1>
				<div class="tab-content">
					<div class="tab-pane fade in active show">
						<div>
							<form method="POST" action="{{ route('balances.update', $balance->id) }}">
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
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<div class="forms-control">
												<label>Main Balance</label>
												<input type="number"
													   class="form-control @error('main_balance') is-invalid @enderror"
													   name="main_balance"
													   placeholder="Sponsor"
													   value="{{ $balance->main_balance }}"
												/>
												<div class="help-block"></div>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<div class="forms-control">
												<label>Group Balance</label>
												<input type="number"
													   class="form-control @error('group_balance') is-invalid @enderror"
													   name="group_balance"
													   placeholder="Group Balance"
													   value="{{ $balance->group_balance }}"
												/>
												<div class="help-block"></div>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
									</div>
									<div class="col-md-8 col-sm-12">
										<div class="d-flex justify-content-end">
											<div class="btn-actions-pane-right">
												<button type="submit" class="btn btn-lg btn-primary">Update</button>
											</div>
										</div>
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
@endsection