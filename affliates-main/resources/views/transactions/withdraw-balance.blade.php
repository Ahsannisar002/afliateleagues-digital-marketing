@extends ('layouts.app')
@section('title')
	<title>Withdraw Balance - Amlaen</title>
@endsection
@section('style')
	<style type="text/css">
        .nav.nav-tabs {
            border: none;
            margin-bottom: 1rem;
            border-radius: 0;
        }

        .nav.nav-tabs,
        .nav.nav-tabs .nav-item {
            position: relative;
        }

        .nav.nav-tabs .nav-item .nav-link {
            color: #626262;
            font-size: .95rem;
            border: none;
            min-width: auto;
            font-weight: 450;
            padding: .61rem .635rem;
            border-radius: 0;
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            position: relative;
            color: #00a5d4;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
            background-color: transparent;
        }

        .nav.nav-tabs .nav-item .nav-link.active:after {
            content: attr(data-before);
            height: 2px;
            width: 100%;
            left: 0;
            position: absolute;
            bottom: 0;
            top: 100%;
            background: #00a5d4 !important;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
            -webkit-transition: all .2s linear;
            transition: all .2s linear;
        }

        .btn-primary {
            border-color: #FF9F43 !important;
            background-color: #FF9F43 !important;
            color: #FFF;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .content-area {
            min-height: 450px;
            padding: 40px 0;
        }

        .new-form-container .tab-content {
            padding: 36px 30px;
        }

        .new-form-container {
            background-color: #ffffff;
            -webkit-box-shadow: 8px 5px 17px -7px #ccc;
            box-shadow: 8px 5px 17px -7px #ccc;
        }

        .amount-heading {
            background-image: url(assets/img/layer.png);
            background-repeat: repeat-x;
            background-position: 0 0;
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: baseline;
        }

        .purchase-pin-title {
            padding: 1.3em;
            color: #fff;
            font-size: 1.5rem;
            text-align: center;
        }

        .purchase-pin-ammount {
            color: #fff;
            text-align: center;
            font-size: 2.125rem;
            float: right;
            padding: .95em;
        }

        .new-form-container .nav-tabs.nav {
            padding: 1.5em 1.5em 0 1.5em;
        }

        .new-form-container .tab-content form .btn {
            background-color: #FF9F43;
            border: 1px solid #FF9F43;
            color: #fff;
            text-transform: capitalize;
            margin: 0 auto;
            -webkit-box-shadow: 0 1px 12px 4px hsla(240, 7%, 85%, .6);
            box-shadow: 0 1px 12px 4px hsla(240, 7%, 85%, .6);
        }

        .new-form-container .tab-content form .btn:hover {
            box-shadow: 0 0 15px #FF9F43;
            transition: all 0.2s;
            color: #fff;
        }
        .inp-shadow {
            -webkit-box-shadow: 0 5px 5px 0 #ccc;
            box-shadow: 0 5px 5px 0 #ccc;
        }

        #history table.pincreate-history .btn {
            background-color: #FF9F43;
            border: 1px solid #FF9F43;
            color: #fff;
        }

        @media (max-width: 576px) {
            .amount-heading {
                background-image: url(assets/img/layer.png);
                background-repeat: repeat-x;
                background-position: 0 0;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .purchase-pin-title {
                padding: 1em 1.3em 0 1.3em;
                color: #fff;
                font-size: 1.2rem;
                text-align: center;
            }

            .purchase-pin-ammount {
                color: #fff;
                text-align: center;
                font-size: 28px;
                float: right;
                padding: 0;
            }

            label {
                display: inline-block;
                margin-bottom: 0.5rem;
                color: #212529;
                font-size: 1rem;
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
				<div class="amount-heading">
					<h2 class="purchase-pin-title">Withdraw Able Balance: </h2>
					<h2 class="purchase-pin-ammount">{{ number_format(current_user()->balance->main_balance, 2, '.', ',') }}</h2>
				</div>
				<ul role="tablist" class="nav nav-tabs">
					<li class="nav-item">
						<a href="#eran" role="tab" data-toggle="tab" class="nav-link active" aria-selected="true">
							<i class="fal fa-share-square mr-2"></i>Withdraw Balance</a>
					</li>
					<li class="nav-item">
						<a href="#history" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">
							<i class="fal fa-history mr-2"></i>History</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" id="eran" class="tab-pane fade in active show">
						@if (current_user()->balance->main_balance > 1)
							@if($errors->any())
								@foreach ($errors->all() as $error)
									{{! toast($error, 'error') }}
								@endforeach
							@endif
							<form id="withdraw-balance-form" action="{{ route('withdraw.store', current_user()->id) }}"
								  method="POST" autocomplete="off">
								@csrf
								<div class="alert alert-info alert-dismissible fade show" role="alert">
									<strong>Notice:</strong> The details that I will provide are accurate.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@livewire('withdraw-gateway-selector')
							</form>
						@else
							<div class="alert alert-info alert-dismissible fade show" role="alert">
								<strong>Low Balance</strong> You should have 1$ in Main balance.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
					@endif
					<!---->
					</div>
					<div role="tabpanel" id="history" class="tab-pane fade">
						<div role="tabpanel" id="history" class="tab-pane fade active show">
							<div class="table-responsive">
								<table class="align-middle mb-0 table table-striped table-hover">
									<thead>
									<tr>
										<th>ID</th>
										<th>Gateway</th>
										<th>Account</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Date</th>
									</tr>
									</thead>
									<tbody>
									@foreach ($history as $data)
										<tr>
											<td>{{ $data->id }}</td>
											<td>{{ $data->paymentGateway->name }}</td>
											<td>{{ $data->paymentGateway->account_iban }}</td>
											<td>{{ $data->amount }}</td>
											<td>
												<div style="font-size: 14px" class="badge
													@if ($data->status === 0)
														badge-info
													@elseif($data->status === 1)
														badge-success
													@endif"
												>
													@if ($data->status === 0)
														pending
													@elseif($data->status === 1)
														approved | TID: {{ $data->approved_transaction_id }}
													@endif
												</div>
											</td>
											<td>{{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
	<script>

        $("#modal").on('click', function () {
            console.log('hgjhg')
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are requesting withdraw of ' + $("#amount").val(),
                position: "top",
                showCancelButton: true,
                confirmButtonColor: '#218838',
                cancelButtonColor: '#c82333',
                confirmButtonText: 'Proceed!'
            }).then((result) => {
                if (result.value) {
                    $("#withdraw-balance-form").submit()
                }
            })
        })
        $("#withdraw-balance-form").on('keydown', (e) => {
            if (e.keyCode === 13) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are requesting withdraw of ' + $("#amount").val(),
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#withdraw-balance-form").submit()
                    }
                })
            }
        });
	
	</script>
@endsection