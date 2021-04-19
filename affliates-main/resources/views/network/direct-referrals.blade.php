@extends ('layouts.app')
@section('title')
	<title>Direct Referrals - Affliates leagues</title>
@endsection
@section('style')
	<style type="text/css">
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
            width: auto;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            bottom: 0;
        }

        .new-form-container .tab-content form .btn {
            background-color: #FF9F43;
            padding: .58rem .75rem;
            border: 1px solid #FF9F43;
            color: #fff;
            text-transform: capitalize;
            margin: 0 auto;
            border-radius: 0.25rem;
        }

        .new-form-container .tab-content form .btn:hover {
            box-shadow: 0 0 15px #FF9F43;
            transition: all 0.2s;
            color: #fff;
        }
        .custom-page-digits {
            padding-right: 8px;
        }

        .custom-page-digits>a,
        .custom-page-item>a {
            color: #9a9a9a !important;
        }

        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }

        @media (max-width: 575.98px) {
            .new-form-container h1 {
                font-size: 28px;
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
				<h1>Direct Referrals</h1>
				<div class="table-responsive mt-4">
					<table class="align-middle mb-0 table table-borderless table-striped table-hover">
						<thead>
						<tr>
							<th class="text-center">ID</th>
							<th>Name</th>
							<th class="text-center">Username</th>
							<th class="text-center">Email</th>
							<th class="text-center">Phone</th>
							<th class="text-center">MemberShip Name</th>
							<th class="text-center">Status</th>
							<th class="text-center">Registered On</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($directReferrals as $directReferral)
							<tr>
								
								<td class="text-center text-muted">{{ $directReferral->id }}</td>
								<td>
									<div class="widget-content p-0">
										<div class="widget-content-wrapper">
											<div class="widget-content-left mr-3">
												<div class="widget-content-left">
													<img class="rounded-circle"
														 src="{{ 'https://ui-avatars.com/api/?background=645bd3&color=fff&name=' . $directReferral->name }}"
														 alt="User Avatar"
														 height="40" width="40">
												</div>
											</div>
											<div class="widget-content-left flex2">
												<div class="widget-heading">{{ $directReferral->name }}</div>
												<div class="widget-subheading1 opacity-7">{{ $directReferral->getRoleNames()[0] }}</div>
											</div>
										</div>
									</div>
								</td>
								<td class="text-center text-muted">{{ $directReferral->username }}</td>
								<td class="text-center text-muted">{{ $directReferral->email }}</td>
								<td class="text-center text-muted">{{ $directReferral->phone }}</td>
								<td class="text-center">{{ current_user_membership($directReferral->id) }}</td>
								<td class="text-center">
									<div class="badge
											@if ($directReferral->status === 0)
												badge-warning
												@elseif($directReferral->status === 1)
												badge-success
												@elseif($directReferral->status === 2)
												badge-danger
												@elseif($directReferral->status === 3)
												badge-dark
											@endif"
									>
										@if ($directReferral->status === 0)
											Inactive
										@elseif($directReferral->status === 1)
											Active
										@elseif($directReferral->status === 2)
											Suspended
										@elseif($directReferral->status === 3)
											Blocked
										@endif
									</div>
								</td>
								<td class="text-center">{{ Carbon\Carbon::parse($directReferral->created_at)->format('d M Y') }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="mt-3">{{ $directReferrals->links('vendor.pagination.bootstrap-4') }}</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
@endsection