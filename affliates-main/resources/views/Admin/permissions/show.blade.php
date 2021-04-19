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
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div>
		<div>
			<div class="d-flex justify-content-between align-items-center pb-2">
				<div><h3>Permission</h3></div>
				<div>
					<div class="d-flex justify-content-around align-items-center mr-5">
						<a class="destroy mr-4">
							<form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" id="{{ $permission->id }}">
								@csrf
								@method('DELETE')
							</form>
							<i class="fal fa-trash-alt"></i>
						</a>
						<a href="{{ route('permissions.index') }}" class="back mr-4">
							<i class="fal fa-backward"></i>
						</a>
						<a href="{{ route('permissions.edit', $permission->id) }}" class="edit">
							<i class="fal fa-edit"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-outer">
			<div class="row main">
				<div class="col-lg-6">
					<div class="profile-inner column-name">
						<h4 class="pb-2">{{ $permission->name }}</h4>
						<select name="role_id" id="role"
								class="form-control">
							@foreach ($roleHasPermission as $value)
								<option value="{{ $value->id }}">
									@if ($value->role_id == 1)
										{{ strtoupper($roles->where('id', 1)->pluck('name')[0]) }}
									@elseif($value->role_id == 2)
										{{ strtoupper($roles->where('id', 2)->pluck('name')[0]) }}
									@elseif($value->role_id == 3)
										{{ strtoupper($roles->where('id', 3)->pluck('name')[0]) }}
									@elseif($value->role_id == 4)
										{{ strtoupper($roles->where('id', 4)->pluck('name')[0]) }}
									@elseif($value->role_id == 5)
										{{ strtoupper($roles->where('id', 5)->pluck('name')[0]) }}
									@elseif($value->role_id == 6)
										{{ strtoupper($roles->where('id', 6)->pluck('name')[0]) }}
									@elseif($value->role_id == 7)
										{{ strtoupper($roles->where('id', 7)->pluck('name')[0]) }}
									@elseif($value->role_id == 8)
										{{ strtoupper($roles->where('id', 8)->pluck('name')[0]) }}
									@elseif($value->role_id == 9)
										{{ strtoupper($roles->where('id', 9)->pluck('name')[0]) }}
									@elseif($value->role_id == 10)
										{{ strtoupper($roles->where('id', 10)->pluck('name')[0]) }}
									@elseif($value->role_id == 11)
										{{ strtoupper($roles->where('id', 11)->pluck('name')[0]) }}
									@elseif($value->role_id == 12)
										{{ strtoupper($roles->where('id', 12)->pluck('name')[0]) }}
									@elseif($value->role_id == 13)
										{{ strtoupper($roles->where('id', 13)->pluck('name')[0]) }}
									@elseif($value->role_id == 14)
										{{ strtoupper($roles->where('id', 14)->pluck('name')[0]) }}
									@elseif($value->role_id == 15)
										{{ strtoupper($roles->where('id', 15)->pluck('name')[0]) }}
									@elseif($value->role_id == 16)
										{{ strtoupper($roles->where('id', 16)->pluck('name')[0]) }}
									@elseif($value->role_id == 17)
										{{ strtoupper($roles->where('id', 17)->pluck('name')[0]) }}
									@elseif($value->role_id == 18)
										{{ strtoupper($roles->where('id', 18)->pluck('name')[0]) }}
									@elseif($value->role_id == 19)
										{{ strtoupper($roles->where('id', 19)->pluck('name')[0]) }}
									@elseif($value->role_id == 20)
										{{ strtoupper($roles->where('id', 20)->pluck('name')[0]) }}
									@endif
								</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
@endsection