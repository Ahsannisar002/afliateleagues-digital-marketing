@extends ('Admin.layouts.app')
@section('style')
	<style>
        .search-box {
            width: 300px;
            background-color: #ffffff;
            box-shadow: 0 0 8px #bfc4c9;
            display: flex;
            padding: 8px 12px 8px 12px;
            align-items: center;
            border-radius: 8px;
        }
        .search-dropdown{
            position: absolute;
            z-index: 99999;
            background-color: #fff;
            width: 300px;
            margin-top: 10px;
            box-shadow: 0 0 8px #bfc4c9;

        }
        .search-box > i{
            font-size: 20px;
            color: #bfc4c9;
        }
        .search-box > input{
            flex: 1;
            height: 20px;
            outline: none;
            border: none;
            font-size: 18px;
            color: #c5c9cd;
            padding-left: 10px;
        }
        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
            color: #FFF;
        }
        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }
        .custom-page-digits>a,
        .custom-page-item>a {
            color: #9a9a9a !important;
        }
        .widget-content .widget-content-left .widget-subheading1 {
            opacity: 0.5;
            color: #4839EB;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<section id="dashboard-analytics">
		<div class="row">
			<livewire:admin.admin-search/>
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#usersTable").on('click', '.destroy', function () {

            let $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();
            axios.post('/admin/resources/getAdminDetailsForDestroying', {
                "id": data[0],
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
                        $('#'+data[0]).submit()
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
        })
	
	</script>
@endsection