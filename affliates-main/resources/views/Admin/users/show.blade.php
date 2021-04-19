@extends ('Admin.layouts.app')
@section('style')
	<style>
        h3 {
            color: black;
        }

        .profile-outer {
            background-color: white;
            margin-left: 0;
            margin-right: 0;
            padding: 26px;
        }

        .column-name {
            color: #8d9196;
        }

        .column-data {
            color: #3b3b3c;
        }

        .main {
            padding-top: 1.25em;
            padding-bottom: .8em;
            border-bottom: 1px solid #e3e7eb;
        }

        .destroy {
            padding: 3px 13px 3px 13px;
            background-color: #ff9f43;
            border-radius: 3px;
            font-size: 1.4rem;
            cursor: pointer;
            color: white !important;
        }

        .destroy:hover {
            box-shadow: 0 0 10px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }

        .edit {
            padding: 3px 11px 3px 13px;
            background-color: #645bd3;
            border-radius: 3px;
            font-size: 1.4rem;
            cursor: pointer;
            color: white;
        }

        .back {
            padding: 3px 11px 3px 13px;
            background-color: #d92550;
            border-radius: 3px;
            font-size: 1.4rem;
            cursor: pointer;
            color: white;
        }

        .back:hover {
            box-shadow: 0 0 10px #a91232;
            border-width: 0;
            transition: all 0.2s ease;
            color: #fff;
        }

        .edit:hover {
            box-shadow: 0 0 10px #574dcf;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }
	</style>
	<style type="text/css">
        .tree, .tree ul {
            margin: 0 0 10px;
            padding: 0;
            font-size: 14px;
            list-style: none;
            min-width: 600px;
        }

        .tree ul {
            margin-left: 1em;
            position: relative
        }

        .tree ul ul {
            margin-left: .5em
        }

        .tree ul:before {
            content: "";
            display: block;
            width: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            border-left: 1px solid
        }

        .tree li {
            margin: 0;
            padding: 0 1em;
            line-height: 2em;
            color: #212529;
            font-weight: 500;
            position: relative
        }

        .tree ul li:before {
            content: "";
            display: block;
            width: 10px;
            height: 0;
            border-top: 1px solid;
            margin-top: -1px;
            position: absolute;
            top: 1em;
            left: 0
        }

        .tree ul li:last-child:before {
            background: #fff;
            height: auto;
            top: 1em;
            bottom: 0
        }

        .indicator {
            margin-right: 5px;
        }

        .tree li a {
            text-decoration: none;
            color: #212529;
        }

        .tree li button, .tree li button:active, .tree li button:focus {
            text-decoration: none;
            color: #369;
            border: none;
            background: transparent;
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
            outline: 0;
        }
	</style>
	<style>
        .select-top-spacing {
            padding-top: 2.4em;
        }

        .t_t1 thead {
            background: #f1f2f7;
        }

        .t_t1 thead th {
            color: #212529;
            border: 1px solid #e7e7e7;
        }

        .t_t1 tbody tr td {
            vertical-align: top;
            color: inherit;
            letter-spacing: .7px;
            border: 1px solid #e7e7e7;
            font-size: .86rem;
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
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div>
		<div>
			<div class="d-flex justify-content-between align-items-center pb-2">
				<div><h3>User</h3></div>
				<div>
					<div class="d-flex justify-content-around align-items-center mr-5">
						@role('super-admin', 'admin')
						<a class="destroy mr-4">
							<form action="{{ route('users.destroy', $user->id) }}" method="POST" id="{{ $user->id }}">
								@csrf
								@method('DELETE')
							</form>
							<i class="fal fa-trash-alt"></i>
						</a>
						@endrole
						<a href="{{ route('users.index') }}" class="back mr-4">
							<i class="fal fa-backward"></i>
						</a>
						<a href="{{ route('users.edit', $user->id) }}" class="edit">
							<i class="fal fa-edit"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>ID</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->id }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Account ID</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->account_id }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>User Name</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->username }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Sponsor</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->sponsor }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Full Name</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->name }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Email</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->email }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Status</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<div class="badge
									@if ($user->status === 0)
										badge-warning
										@elseif($user->status === 1)
										badge-success
										@elseif($user->status === 2)
										badge-danger
										@elseif($user->status === 3)
										badge-dark
									@endif
										">
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Date Of Birth</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->date_of_birth }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Mobile Number</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->phone }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>City</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->city }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Address</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->address }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@role('super-admin', 'admin')
	<div>
		<div class="row">
			<div class="col-lg-6 pb-2 pt-3">
				<h3>Balances</h3>
			</div>
			<div class="col-lg-6 pb-2 pt-3">
				<h3>Membership</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Main Balance</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ number_format($user->balance->main_balance, 8, '.', ',') }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Group Balance</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ number_format($user->balance->group_balance, 8, '.', ',') }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Name</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->membership()->name }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Created At</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{  $user->membershipId->expires_at }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div>
			<div class="d-flex justify-content-between align-items-center pb-2 pt-3">
				<div>
					<h3>Role And Permissions</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Permissions Name</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<select name="permission_id" id="role"
										class="form-control">
									@foreach ($user->getAllPermissions() as $value)
										<option value="{{ $value->name }}">
											{{ $value->name }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Role Name</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $user->getRoleNames()[0] }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="d-flex justify-content-between align-items-center pb-2 pt-3">
				<div>
					<h3>Network</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="profile-outer">
					<div class="col-md-12">
						<p>(You can view your network tree by clicking on the node.)</p>
						<ul id="tree1">
							<li>
								<a href="#">{{ '(You) '. $user->username . ' ['. $user->account_id . '-' .$user->id. '] ( ' .count($user->referrals) .' Referrals )' }}</a>
								
								<ul>
									@foreach ($users as $value)
										<li>{{ $value->username . ' ['. $value->account_id . '-' .$value->id. '] ( ' .count($value->referrals) .' Referrals )' }}
											@if(count($value->referrals))
												<ul>@include('network.subTree',['referrals' => $value->referrals])</ul>
											@endif
										</li>
									@endforeach
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div>
			<div class="d-flex justify-content-between align-items-center pb-2 pt-3">
				<div>
					<h3>Transactions</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="profile-outer">
					<div class="table-responsive">
						<table class="table table-bordered t_t1">
							<thead>
							<tr>
								<th>#</th>
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
									<td>{{ $transaction->balance_field }}</td>
									<td>{{ $transaction->credit_debit }}</td>
									<td>{{ number_format($transaction->transaction_amount, 8, '.', ',') }}</td>
									<td>{{ number_format($transaction->old_balance, 8, '.', ',') }}</td>
									<td>{{ number_format($transaction->new_balance, 8, '.', ',') }}</td>
									<td style="width: 100px;">{{ $transaction->transactions_details }}
									</td>
									<td>{{ $transaction->trans_date_time }}</td>
								</tr>
							@endforeach
						</table>
						{{ $transactions->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
	<script>
        $(".destroy").on('click', function () {
            axios.post('/admin/resources/getUserDetailsForDestroying', {
                "id": {{ $user->id }},
            }).then(function (response) {
                Swal.fire({
                    title: response.data.name,
                    text: 'Are you sure, you want to delete ' + response.data.username + ' !',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $('#' +{{ $user->id }}).submit()
                    }
                })
            }).catch((error) => {
                const errors = error.response.data.errors
                const firstItem = Object.keys(errors)[0];
                const firstErrorMessage = errors[firstItem][0]

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: false,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: 'error',
                    title: firstErrorMessage
                });
            });
        });
	</script>
	<script>
        $.fn.extend({
            treed: function (o) {

                // var openedClass = 'glyphicon-minus-sign';
                // var closedClass = 'glyphicon-plus-sign';

                var openedClass = 'fal fa-minus-square';
                var closedClass = 'fal fa-plus-square';

                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                }


                //initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });
                //fire event from the dynamically added icon
                tree.find('.branch .indicator').each(function () {
                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
                //fire event to open branch if the li contains an anchor instead of text
                tree.find('.branch>a').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                //fire event to open branch if the li contains a button instead of text
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });

        //Initialization of treeviews

        $('#tree1').treed();
	</script>
@endsection

@endrole