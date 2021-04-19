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
	<div class="scrollbar-container">
	</div>
	<section id="dashboard-analytics">
		<div class="row">
			<div class="col-12">
				<div class="d-flex justify-content-between mb-3">
					<div class="position-relative">
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-header">
						Pending Withdrawals
					</div>
					<div class="table-responsive">
						<table id="pendingWithdrawalsTable"
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
								<th>Amount</th>
								<th>Status</th>
								<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
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
									<td class="text-muted">
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
												Success
											
											@elseif($withdraw->status === 2)
												Suspended
											@elseif($withdraw->status === 3)
												Blocked
											@endif
										</div>
									</td>
									<td class="text-center">
										<div class="d-flex justify-content-around align-items-center">
											<a href="{{ route('withdraws.edit', $withdraw->id) }}"
											   class="btn btn-success"><i
														class="fal fa-check"></i></a>
											<form action="{{ route('withdraws.reject', $withdraw->id) }}" method="POST">
												@csrf
												@method('PUT')
												<button type="submit" class="btn btn-danger ml-2"><i
															class="fal fa-times"></i></button>
											</form>
										
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