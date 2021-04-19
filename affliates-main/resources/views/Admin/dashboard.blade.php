@extends ('Admin.layouts.app')

@section('meta')
	<title>App Dashboard</title>
@endsection
@section('style')
	<style>
        .search-box {
            width: 300px;
            background-color: #ffffff;
            box-shadow: 0 0 8px #bfc4c9;
            display: flex;
            padding: 8px 12px 8px 12px;
            align-items: center;
            border-radius: 8px;
        }
        .search-dropdown{
            position: absolute;
            z-index: 99999;
            background-color: #fff;
            width: 300px;
            margin-top: 10px;
            box-shadow: 0 0 8px #bfc4c9;

        }
        .search-box > i{
            font-size: 20px;
            color: #bfc4c9;
        }
        .search-box > input{
            flex: 1;
            height: 20px;
            outline: none;
            border: none;
            font-size: 18px;
            color: #c5c9cd;
            padding-left: 10px;
        }
        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }
        .custom-page-digits>a,
        .custom-page-item>a {
            color: #9a9a9a !important;
        }
        .text-primary {
            color: #00a5d4 !important;
        }
        .widget-content .widget-content-left .widget-subheading1 {
            opacity: 0.5;
            color: #4839EB;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<section id="dashboard-analytics">
		<div class="row">
			@role('super-admin', 'admin')
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earning Balance
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalMainBalance, 2, '.', ',') }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Group Earning
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalGroupBalance, 2, '.', ',') }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Members
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Members
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todaysUsers }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Starter
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $starterMemberships }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-shopping-basket fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CHALLENGE ACCEPTANCE
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $joiningMemberships }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-shopping-basket fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CHALLENGE BOOSTER
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $basicMemberships }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-shopping-basket fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CHALLENGE RUNNER
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $silverMemberships }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-shopping-basket fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Memberships
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingMemberships }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-shopping-basket fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Withdraws
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingWithdraws }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-shopping-basket fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endrole
		</div>
		<div class="row">
			@livewire('admin.user-search')
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#destroy").on('click', function () {
            axios.post('/admin/resources/getUserDetailsForDestroying', {
                "id": $("#id").val(),
            }).then(function (response) {
                Swal.fire({
                    title: response.data.name,
                    text: 'Are you sure, you want to delete ' + response.data.username + ' !',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#destroy-user").submit()
                    }
                })
            }).catch((error) => {
                const errors = error.response.data.errors
                const firstItem = Object.keys(errors)[0];
                const firstErrorMessage = errors[firstItem][0]

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: false,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: 'error',
                    title: firstErrorMessage
                });
            });
        })
	
	</script>
@endsection
