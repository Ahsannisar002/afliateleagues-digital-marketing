<div class="col-md-12">
	<div class="d-flex justify-content-between mb-3">
		<div class="position-relative">
			<div>
				<div class="search-box">
					<i class="fal fa-search"></i>
					<input type="text" wire:model="username" placeholder="Search Admins"/>
				</div>
			</div>
		</div>
		<div class="btn-actions-pane-right">
			<a href="{{ route('admins.create') }}" class="btn btn-lg btn-primary">Create Admin</a>
		</div>
	</div>
	<div class="main-card mb-3 card">
		<div class="card-header">
			@if ($admins->count() <= 0)
				Nothing this For Search Query
			@else
				Admins
			@endif
		</div>
		<div class="table-responsive">
			
			@if ($admins->count() > 0)
				<table id="usersTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
					<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Name</th>
						<th class="text-center">Account ID</th>
						<th class="text-center">User Name</th>
						<th class="text-center">Status</th>
						<th class="text-center">Role</th>
						<th class="text-center">Permission</th>
						<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($admins as $admin)
						<tr>
							<td class="text-center text-muted">{{ $admin->id }}</td>
							<td>
								<div class="widget-content p-0">
									<div class="widget-content-wrapper">
										<div class="widget-content-left mr-3">
											<div class="widget-content-left">
												<img class="rounded-circle"
													 src="@if($admin->user_file){{ asset('storage/'. $admin->user_file) }}@else{{ 'https://ui-avatars.com/api/?size=128&background=00a5d4&color=fff&name='. $admin->name }} @endif"
													 alt=""
													 height="40" width="40">
											</div>
										</div>
										<div class="widget-content-left flex2">
											<div class="widget-heading" style="color: black">{{ $admin->name }}</div>
											<div class="widget-subheading1 opacity-7">{{ $admin->getRoleNames()[0] }}</div>
										</div>
									</div>
								</div>
							</td>
							<td class="text-center text-muted">{{ $admin->account_id }}</td>
							<td class="text-center">{{ $admin->username}}</td>
							<td class="text-center">
								<div class="badge
											@if ($admin->status === 0)
										badge-warning
@elseif($admin->status === 1)
										badge-success
@elseif($admin->status === 2)
										badge-danger
@elseif($admin->status === 3)
										badge-dark
@endif">
									@if ($admin->status === 0)
										Inactive
									@elseif($admin->status === 1)
										Active
									@elseif($admin->status === 2)
										Suspended
									@elseif($admin->status === 3)
										Blocked
									@endif
								</div>
							</td>
							<td class="text-center">
								<div class="badge badge-success"><a class="text-white" href="{{ route('admins.assignRole.create', $admin->id) }}">Assign Role</a></div>
							</td>
							<td class="text-center">
								<div class="badge badge-success"><a class="text-white" href="{{ route('admins.givePermission.create', $admin->id) }}">Give Permission</a></div>
							</td>
							<td class="text-center">
								<div class="d-flex justify-content-around align-items-center">
									<a href="{{ route('admins.show', $admin->id) }}" class="text-muted">
										<i class="fal fa-window-frame-open"></i>
									</a>
									<a href="{{ route('admins.edit', $admin->id) }}" class="text-muted">
										<i class="fal fa-edit"></i>
									</a>
									<a class="text-muted destroy" style="cursor: pointer">
										<form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
											  id="{{ $admin->id }}">
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
			@endif
		</div>
	</div>
</div>
@include('sweetalert::alert')
