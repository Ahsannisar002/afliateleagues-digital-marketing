@extends ('Admin.layouts.app')
@section('style')
	<style>
        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }

        .custom-page-digits > a,
        .custom-page-item > a {
            color: #9a9a9a !important;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<section id="dashboard-analytics">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="d-flex justify-content-between mb-3">
					<div class="position-relative">
					</div>
				
				</div>
				<div class="main-card mb-3 card">
					<div class="card-header">
						packages
						<div class="btn-actions-pane-right">
							<a href="{{ route('memberships.create') }}" class="btn btn-lg btn-primary">Create Membership</a>
						</div>
					</div>
					<div class="table-responsive">
						<table id="MembershipsTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-center">ID</th>
								<th>Name</th>
								<th>Price</th>
								<th>Fee</th>
								<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($memberships as $membership)
								<tr>
									<td class="text-center text-muted">{{ $membership->id }}</td>
									<td class="text-muted">{{ $membership->name }}</td>
									<td class="text-muted">{{ $membership->price }}</td>
									<td class="text-muted">{{ $membership->fee }}</td>
									<td class="text-center">
										<div class="d-flex justify-content-around align-items-center">
											<a href="{{ route('memberships.show', $membership->id) }}" class="text-muted">
												<i class="fal fa-window-frame-open"></i>
											</a>
											<a href="{{ route('memberships.edit', $membership->id) }}" class="text-muted">
												<i class="fal fa-edit"></i>
											</a>
											<a class="text-muted destroy" style="cursor: pointer">
												<form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" id="{{ $membership->id }}">
													@csrf
													@method('DELETE')
												</form>
												<i class="fal fa-trash-alt"></i>
											</a>
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#MembershipsTable").on('click', '.destroy', function () {

            let $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();
            axios.post('/admin/getMembershipDetailsForDestroying', {
                "id": data[0],
            }).then(function (response) {
                Swal.fire({
                    title: response.data.name,
                    text: 'Are you sure, you want to delete ' + response.data.name + ' !',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $('#' + data[0]).submit()
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