@extends ('Admin.layouts.app')
@section('style')
	<style>
        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
            color: #FFF;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container"></div>
	<section id="dashboard-analytics">
		<div class="row">
			<div class="col-md-12">
				<div class="d-flex justify-content-between mb-3">
					<div class="position-relative">
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-header">
						Withdrawals
					</div>
					<div class="table-responsive">
						<table id="linksTable"
							   class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>User Id</th>
								<th>Gateway</th>
								<th>Bank</th>
								<th>BB Code</th>
								<th>ACH Name</th>
								<th>Account Number</th>
								<th>REF Number</th>
								<th class="text-center">Amount</th>
								<th class="text-center">Status</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($withdraws as $withdraw)
								<tr>
									<td class="text-muted text-center">{{ $withdraw->id }}</td>
									<td class="text-muted text-center">{{ $withdraw->user->id }}</td>
									<td class="text-muted">{{ $withdraw->paymentGateway->name }}</td>
									<td class="text-muted">{{ $withdraw->bank_name }}</td>
									<td class="text-muted">{{ $withdraw->branch_code }}</td>
									<td class="text-muted">{{ $withdraw->account_holder_name }}</td>
									<td class="text-muted">{{ $withdraw->account_iban }}</td>
									<td class="text-muted">{{ $withdraw->reference_number }}</td>
									<td class="text-muted text-center">{{ $withdraw->amount }}</td>
									<td class="text-muted text-center">
										<div class="badge
											@if ($withdraw->status === 0)
												badge-info
											@elseif($withdraw->status === 1)
												badge-success
											@elseif($withdraw->status === 2)
												badge-danger
											@elseif($withdraw->status === 3)
												badge-dark
											@endif">
											@if ($withdraw->status === 0)
												pending
											@elseif($withdraw->status === 1)
												Success: {{ $withdraw->approved_transaction_id }}
											
											@elseif($withdraw->status === 2)
												Suspended
											@elseif($withdraw->status === 3)
												Blocked
											@endif
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#linksTable").on('click', '.destroy', function () {

            let $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();
            axios.post('/admin/getLinkDetailsForDestroying', {
                "id": data[0],
            }).then(function (response) {
                Swal.fire({
                    title: response.data.link_type,
                    text: 'Are you sure, you want to delete link with ID ' + response.data.id + ' !',
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