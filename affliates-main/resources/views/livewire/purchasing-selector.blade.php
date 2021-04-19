<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="form-group">
			<label for="memberships">
				Select Account
			</label>
			<select class="custom-select @error('payment_gateway_id') is-invalid @enderror" name="payment_gateway_id"
					id="payment_gateway_id" wire:model="selected_payment_gateway_id">
				<option selected>-- Select Account --</option>
				@foreach ($paymentMethods as $method)
					<option value="{{ $method->id }}">{{ $method->name }}</option>
				@endforeach
			</select>
			@if ($details)
				@if ($details->name === 'BTC')
					<p class="pt-3"><strong>Account Number:</strong> {{ $details->account_iban }}</p>
				@elseif($details->name === 'Bank')
					<p class="pt-3"><strong>Account Type:</strong> {{ $details->name }}</p>
					<p><strong>Bank Name:</strong> {{ $details->bank_name }}</p>
					<p><strong>Branch Code:</strong> {{ $details->bank_branch_code }}</p>
					<p><strong>Account Holder Name:</strong> {{ $details->account_holder_name }}</p>
					<p><strong>Account IBAN:</strong> {{ $details->account_iban }}</p>
					<p><strong>Account Reference Number:</strong> {{ $details->reference_number }}</p>
				@elseif($details->name === 'Jazzcash' || $details->name === 'Easypaisa' )
					<p class="pt-3"><strong>Account Type:</strong> {{ $details->name }}</p>
					<p><strong>Account Holder Name:</strong> {{ $details->account_holder_name }}</p>
					<p><strong>Account Number:</strong> {{ $details->account_iban }}</p>
				@endif
			@endif
		</div>
	</div>
</div>
