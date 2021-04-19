<div>
	<div class="d-flex justify-content-between mb-3">
		<div class="position-relative">
			<div>
				<div class="search-box">
					<i class="fal fa-search"></i>
					<input type="text" wire:model="rank" placeholder="Search Ranks"/>
				</div>
			</div>
		</div>
	</div>
	@if (count($ranks) > 0)
		<div class="table-responsive">
			<table class="table table-bordered t_t1" id="documents">
				<thead>
				<tr>
					<th>#</th>
					<th>User Id</th>
					<th>Rank Name</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($ranks as $rank)
					<tr>
						<td>{{ $rank->id }}</td>
						<td>{{ $rank->user_id }}</td>
						<td>{{ $rank->rank_name }}</td>
						<td class="text-center">
							<form action="{{ route('ranks.pending.update', $rank->id) }}"
								  method="POST">
								@csrf
								@method('PUT')
								<button class="btn btn-success ml-2" type="submit">Approve</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $ranks->links('vendor.pagination.bootstrap-4') }}
		</div>
	@endif
</div>
@include('sweetalert::alert')
