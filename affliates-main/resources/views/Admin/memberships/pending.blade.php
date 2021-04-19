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
						Pending Memberships
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">User ID</th>
								<th class="text-center">MemberShip Name</th>
								<th class="text-center">Payment Method</th>
								<th class="text-center">Account Number</th>
								<th class="text-center">Price</th>
								<th class="text-center">Transaction ID</th>
								<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($pendingMemberships as $pendingMembership)
								<tr>
									<td class="text-center text-muted">{{ $pendingMembership->id }}</td>
									<td class="text-center text-muted">{{ $pendingMembership->user->id }}</td>
									<td class="text-center">{{ $pendingMembership->membership->name }}</td>
									<td class="text-center">{{ $pendingMembership->paymentGateway->name }}</td>
									<td class="text-center">{{ $pendingMembership->paymentGateway->account_iban }}</td>
									<td class="text-center">{{ $pendingMembership->transaction_amount }}</td>
									<td class="text-center">{{ $pendingMembership->transaction_id }}</td>
									<td class="text-center">
										<div class="d-flex justify-content-around align-items-center">
											<form action="{{ route('memberships.approve', $pendingMembership->id) }}"
												  method="POST">
												@csrf
												@method('PUT')
												<button type="submit" class="btn btn-success"><i
															class="fal fa-check"></i></button>
											</form>
											<a href="{{ route('memberships.rejection', $pendingMembership->id) }}" class="btn btn-danger"><i class="fal fa-times"></i>
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
		</div>
	</section>
@endsection