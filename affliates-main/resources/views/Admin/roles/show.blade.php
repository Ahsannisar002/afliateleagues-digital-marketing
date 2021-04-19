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
				<div><h3>Role</h3></div>
				<div>
					<div class="d-flex justify-content-around align-items-center mr-5">
						<a class="destroy mr-4">
							<form action="{{ route('roles.destroy', $role->id) }}" method="POST" id="{{ $role->id }}">
								@csrf
								@method('DELETE')
							</form>
							<i class="fal fa-trash-alt"></i>
						</a>
						<a href="{{ route('roles.index') }}" class="back mr-4">
							<i class="fal fa-backward"></i>
						</a>
						<a href="{{ route('roles.edit', $role->id) }}" class="edit">
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
						<h4 class="pb-2">{{ $role->name }}</h4>
						<select name="permission_id" id="permission" class="form-control">
							@foreach ($roleHasPermission as $value)
								<option value="{{ $value->id }}">
									@if ($value->permission_id == 1)
										{{ strtoupper($permissions->where('id', 1)->pluck('name')[0]) }}
									@elseif($value->permission_id == 2)
										{{ strtoupper($permissions->where('id', 2)->pluck('name')[0]) }}
									@elseif($value->permission_id == 3)
										{{ strtoupper($permissions->where('id', 3)->pluck('name')[0]) }}
									@elseif($value->permission_id == 4)
										{{ strtoupper($permissions->where('id', 4)->pluck('name')[0]) }}
									@elseif($value->permission_id == 5)
										{{ strtoupper($permissions->where('id', 5)->pluck('name')[0]) }}
									@elseif($value->permission_id == 6)
										{{ strtoupper($permissions->where('id', 6)->pluck('name')[0]) }}
									@elseif($value->permission_id == 7)
										{{ strtoupper($permissions->where('id', 7)->pluck('name')[0]) }}
									@elseif($value->permission_id == 8)
										{{ strtoupper($permissions->where('id', 8)->pluck('name')[0]) }}
									@elseif($value->permission_id == 9)
										{{ strtoupper($permissions->where('id', 9)->pluck('name')[0]) }}
									@elseif($value->permission_id == 10)
										{{ strtoupper($permissions->where('id', 10)->pluck('name')[0]) }}
									@elseif($value->permission_id == 11)
										{{ strtoupper($permissions->where('id', 11)->pluck('name')[0]) }}
									@elseif($value->permission_id == 12)
										{{ strtoupper($permissions->where('id', 12)->pluck('name')[0]) }}
									@elseif($value->permission_id == 12)
										{{ strtoupper($permissions->where('id', 12)->pluck('name')[0]) }}
									@elseif($value->permission_id == 13)
										{{ strtoupper($permissions->where('id', 13)->pluck('name')[0]) }}
									@elseif($value->permission_id == 14)
										{{ strtoupper($permissions->where('id', 14)->pluck('name')[0]) }}
									@elseif($value->permission_id == 15)
										{{ strtoupper($permissions->where('id', 15)->pluck('name')[0]) }}
									@elseif($value->permission_id == 16)
										{{ strtoupper($permissions->where('id', 16)->pluck('name')[0]) }}
									@elseif($value->permission_id == 17)
										{{ strtoupper($permissions->where('id', 17)->pluck('name')[0]) }}
									@elseif($value->permission_id == 18)
										{{ strtoupper($permissions->where('id', 18)->pluck('name')[0]) }}
									@elseif($value->permission_id == 19)
										{{ strtoupper($permissions->where('id', 19)->pluck('name')[0]) }}
									@elseif($value->permission_id == 20)
										{{ strtoupper($permissions->where('id', 20)->pluck('name')[0]) }}
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