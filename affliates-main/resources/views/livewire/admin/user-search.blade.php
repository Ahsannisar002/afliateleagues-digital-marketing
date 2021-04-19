<div class="col-md-12">
	<div class="d-flex justify-content-between mb-3">
		<div class="position-relative">
			<div>
				<div class="search-box">
					<i class="fal fa-search"></i>
					<input type="text" wire:model="username" placeholder="Search Users"/>
				</div>
			</div>
		</div>
		<div class="btn-actions-pane-right">
			<a href="{{ route('users.create') }}" class="btn btn-lg btn-primary">Create User</a>
		</div>
	</div>
	<div class="main-card mb-3 card">
		<div class="card-header">
			@if ($users->count() <= 0)
				Nothing this For Search Query
			@else
				Users
			@endif
		</div>
		<div class="table-responsive">
			
			@if ($users->count() > 0)
				<table id="usersTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
					<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Name</th>
						<th class="text-center">Account ID</th>
						<th class="text-center">User Name</th>
						<th class="text-center">Status</th>
						@role('super-admin', 'admin')
						<th class="text-center">Sponsor</th>
						<th class="text-center">Balance</th>
						<th class="text-center">Role</th>
						<th class="text-center">Permission</th>
						@endrole
						<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($users as $user)
						<tr>
							<td class="text-center text-muted">{{ $user->id }}</td>
							<td>
								<div class="widget-content p-0">
									<div class="widget-content-wrapper">
										<div class="widget-content-left mr-3">
											<div class="widget-content-left">
												<img class="rounded-circle"
													 src="@if($user->user_file)
													 {{ 'https://umair.s3.ap-south-1.amazonaws.com/users/profile/images/'. $user->user_file }}
													 @else{{ 'https://ui-avatars.com/api/?background=00a5d4&color=fff&name=' . $user->name }}
													 @endif"
													 alt="User Avatar"
													 height="40" width="40">
											</div>
										</div>
										<div class="widget-content-left flex2">
											<div class="widget-heading" style="color: black">{{ $user->name }}</div>
											<div class="widget-subheading1 opacity-7">{{ $user->getRoleNames()[0] }}</div>
										</div>
									</div>
								</div>
							</td>
							<td class="text-center text-muted">{{ $user->account_id }}</td>
							<td class="text-center">{{ $user->username}}</td>
							<td class="text-center">
								<div class="badge
											@if ($user->status === 0)
										badge-warning
@elseif($user->status === 1)
										badge-success
@elseif($user->status === 2)
										badge-danger
@elseif($user->status === 3)
										badge-dark
@endif">
									@if ($user->status === 0)
										Inactive
									@elseif($user->status === 1)
										Active
									@elseif($user->status === 2)
										Suspended
									@elseif($user->status === 3)
										Blocked
									@endif
								</div>
							</td>
							@role('super-admin', 'admin')
							<td class="text-center">{{ $user->sponsor}}</td>
							<td class="text-center">
								<div class="badge badge-success">
									<a class="text-white" href="{{ route('balances.edit', $user->id) }}">
										Edit
									</a>
								</div>
							</td>
							<td class="text-center">
								<div class="badge badge-success"><a class="text-white"
																	href="{{ route('users.assignRole.create', $user->id) }}">Assign
										Role</a></div>
							</td>
							<td class="text-center">
								<div class="badge badge-success"><a class="text-white"
																	href="{{ route('users.givePermission.create', $user->id) }}">Give
										Permission</a></div>
							</td>
							@endrole
							<td class="text-center">
								<div class="d-flex justify-content-around align-items-center">
									@role('super-admin', 'admin')
									<a href="{{ route('users.show', $user->id) }}" class="text-muted">
										<i class="fal fa-window-frame-open"></i>
									</a>
									@endrole
									<a href="{{ route('users.edit', $user->id) }}" class="text-muted">
										<i class="fal fa-edit"></i>
									</a>
									@role('super-admin', 'admin')
									<a class="text-muted destroy" style="cursor: pointer">
										<form action="{{ route('users.destroy', $user->id) }}" method="POST"
											  id="{{ $user->id }}">
											@csrf
											@method('DELETE')
										</form>
										<i class="fal fa-trash-alt"></i>
									</a>
									@endrole
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				{{ $users->links('vendor.pagination.bootstrap-4') }}
			@endif
		</div>
	</div>
</div>

@include('sweetalert::alert')
