<div class="row">
	<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
		<div class="form-group">
			<label for="memberships">
				Select Gateway
			</label>
			<select class="custom-select @error('payment_gateway_id') is-invalid @enderror" name="payment_gateway_id"
					id="payment_gateway_id" wire:model="selected_payment_gateway_id">
				<option selected>-- Select Gateway --</option>
				@foreach ($paymentMethods as $method)
					@if ($loop->first)
						<option value="{{ $method->id }}">{{ $method->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-xl-8 col-lg-10 col-md-10 col-sm-12">
	</div>
	@if ($details)
		@if ($details->name === 'BTC')
			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
				<div class="form-group">
					<label for="wallet_address">Wallet Address</label>
					<input required type="text" id="wallet_address" name="wallet_address"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
				<div class="form-group">
					<label for="amount">Amount</label>
					<input required type="number" id="amount" name="amount"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-xl-8 col-lg-10 col-md-10 col-12">
				<div class="d-flex justify-content-end">
					<div class="btn-actions-pane-right">
						<button id="modal" type="submit" class="btn btn-lg btn-primary">Withdraw</button>
					</div>
				</div>
			</div>
		@elseif($details->name === 'Bank')
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="bank_name">Bank Name</label>
					<input required type="text" id="bank_name" name="bank_name"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="branch_code">Branch Code</label>
					<input required type="text" id="branch_code" name="branch_code"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="account_holder_name">Account Holder Name</label>
					<input required type="text" id="account_holder_name" name="account_holder_name"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="account_iban">IBAN</label>
					<input required type="text" id="account_iban" name="account_iban"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="reference_number">Reference Number</label>
					<input required type="number" id="reference_number" name="reference_number"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="amount">Amount</label>
					<input required type="number" id="amount" name="amount"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-12">
				<div class="d-flex justify-content-end">
					<div class="btn-actions-pane-right">
						<button id="modal" type="submit" class="btn btn-lg btn-primary">Withdraw</button>
					</div>
				</div>
			</div>
		@elseif($details->name === 'Jazzcash')
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="account_holder_name">Account Holder Name</label>
					<input required type="text" id="account_holder_name" name="account_holder_name"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="account_number">Account Number</label>
					<input required type="number" id="account_number" name="account_number"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="amount">Amount</label>
					<input required type="number" id="amount" name="amount"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-12">
				<div class="d-flex justify-content-end">
					<div class="btn-actions-pane-right">
						<button type="submit" class="btn btn-lg btn-primary" id="modal">Withdraw</button>
					</div>
				</div>
			</div>
		@elseif($details->name === 'Easypaisa' )
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="account_holder_name">Account Holder Name</label>
					<input required type="text" id="account_holder_name" name="account_holder_name"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="account_number">Account Number</label>
					<input required type="number" id="account_number" name="account_number"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<label for="amount">Amount</label>
					<input required type="number" id="amount" name="amount"
						   class="form-control inp-shadow">
				</div>
			</div>
			<div class="col-12">
				<div class="d-flex justify-content-end">
					<div class="btn-actions-pane-right">
						<button type="submit" class="btn btn-lg btn-primary" id="modal">Withdraw</button>
					</div>
				</div>
			</div>
		@endif
	@endif
</div>
