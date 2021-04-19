<div>
	<div class="d-flex justify-content-between mb-3">
		<div class="position-relative">
			<div>
				<div class="search-box">
					<i class="fal fa-search"></i>
					<input type="text" wire:model="user_id" placeholder="Search Ranks"/>
				</div>
			</div>
		</div>
	</div>
	@if (count($transactions) > 0)
		<div class="table-responsive">
			<table class="table table-bordered t_t1">
				<thead>
				<tr>
					<th>#</th>
					<th>User ID</th>
					<th>Type</th>
					<th>CR/DR</th>
					<th>Amount</th>
					<th>Old Balance</th>
					<th>New Balance</th>
					<th style="width: 330px;">Detail</th>
					<th>Date</th>
				</tr>
				</thead>
				@foreach ($transactions as $transaction)
					<tr>
						<td>{{ $transaction->id }}</td>
						<td>{{ $transaction->user_id }}</td>
						<td>{{ $transaction->balance_field }}</td>
						<td>{{ $transaction->credit_debit }}</td>
						<td>{{ number_format($transaction->transaction_amount, 4, '.', ',') }}</td>
						<td>{{ number_format($transaction->old_balance, 4, '.', ',') }}</td>
						<td>{{ number_format($transaction->new_balance, 4, '.', ',') }}</td>
						<td style="width: 100px;">{{ $transaction->transactions_details }}
						</td>
						<td>{{ $transaction->trans_date_time }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	@endif
</div>
@include('sweetalert::alert')