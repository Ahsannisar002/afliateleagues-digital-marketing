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
				<div><h3>Title</h3></div>
				<div>
					<div class="d-flex justify-content-around align-items-center mr-5">
						<a class="destroy mr-4">
							<form action="{{ route('titles.destroy', $title->id) }}" method="POST" id="{{ $title->id }}">
								@csrf
								@method('DELETE')
							</form>
							<i class="fal fa-trash-alt"></i>
						</a>
						<a href="{{ route('titles.index') }}" class="back mr-4">
							<i class="fal fa-backward"></i>
						</a>
						<a href="{{ route('titles.edit', $title->id) }}" class="edit">
							<i class="fal fa-edit"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-outer">
			<div class="row">
				<div class="col-lg-6">
					<div class="profile-outer">
						<div class="row">
							<div class="col-lg-4">
								<div class="profile-inner column-name">
									<h6>ID</h6>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="profile-inner column-data">
									<h6>{{ $title->id }}</h6>
								</div>
							</div>
						</div>
						<div class="row main">
							<div class="col-lg-4">
								<div class="profile-inner column-name">
									<h6>Title</h6>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="profile-inner column-data">
									<h6>{{ $title->title }}</h6>
								</div>
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
        $(".destroy").on('click', function () {
            axios.post('/admin/getTitleDetailsForDestroying', {
                "id": {{ $title->id }},
            }).then(function (response) {
                Swal.fire({
                    title: response.data.name,
                    text: 'Are you sure, you want to delete ' + response.data.name + ' !',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $('#' +{{ $title->id }}).submit()
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
@endsection