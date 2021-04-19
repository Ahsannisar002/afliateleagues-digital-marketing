@extends ('layouts.app')
@section('title')
    <title>Referral Link - Affliates leagues</title>
@endsection
@section('style')
<style type="text/css">
    .new-form-container {
        background-color: #ffffff;
        -webkit-box-shadow: 8px 5px 17px -7px #ccc;
        box-shadow: 8px 5px 17px -7px #ccc;
    }

    .new-form-container .tab-content {
        padding: 36px 30px;
    }

    .new-form-container h1 {
        margin-left: 0;
        margin-bottom: 0;
        text-align: center;
        background-color: #00a5d4;
        color: #fff;
        font-size: 38px;
        padding: 16px 0 15px;
        position: relative;
    }

    .new-form-container h1:after {
        display: block;
        content: "";
        height: 6px;
        background-color: #FF9F43;
        width: auto;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        bottom: 0;
    }

    .new-form-container .tab-content form .btn {
        background-color: #FF9F43;
        padding: .58rem .75rem;
        border: 1px solid #FF9F43;
        color: #fff;
        text-transform: capitalize;
        margin: 0 auto;
        border-radius: 0.25rem;
    }

    .new-form-container .tab-content form .btn:hover {
        box-shadow: 0 0 15px #FF9F43;
        transition: all 0.2s;
        color: #fff;
    }

    @media (max-width: 575.98px) {
        .new-form-container h1 {
            font-size: 28px;
        }
    }
</style>
<style type="text/css">
    #umaie {
        padding: 0;
        color: #1d2023;
    }

    .img-db {
        border-radius: 50%;
        width: 20px;
        height: 20px;
        overflow: hidden;
        float: left;
        text-align: center;
        border: 1px solid green;
        margin-right: 5px
    }

    .item {
        cursor: pointer
    }

    .bold {
        line-height: 22px
    }

    ul {
        line-height: 1.5em;
        list-style: none
    }

    ul#umaie li ul.adjust {
        padding-left: 20px
    }

    ul#umaie>li {
        background-image: none !important
    }

    ul#umaie ul li {
        background-position: 14px;
        background-repeat: repeat-y;
        background-image: url(assets/images/only-borderli.png);
        overflow: hidden
    }

    ul#umaie ul.undefined-ulclass,
    ul#umaie ul li:last-child {
        background-image: none
    }

    ul#umaie li {
        min-height: 22px;
        min-width: 600px
    }

    ul#umaie li ul.adjust li.lihaschildren ul.adjust .lihasnotchildren {
        position: relative;
        clear: both;
        padding-left: 20px
    }

    ul#umaie li ul.adjust li.lihaschildren ul.adjust .lihasnotchildren .leg {
        position: absolute;
        left: 0;
        top: 0
    }

    ul#umaie li ul.adjust li.lihaschildren ul.adjust .lihasnotchildren>div {
        float: left;
        clear: both;
        padding-left: 6px;
        padding-top: 0
    }

    .umaoie {
        background-size: 320px 96px;
        background-image: url(assets/images/tree-32px.png);
        float: left;
        min-width: 25px
    }

    .umaoie.leg {
        background-position: -65px -5px;
        width: 22px;
        height: 22px
    }

    .umaoie.flower {
        width: 0;
        height: 0;
        background-image: none
    }

    .tree .haschildren {
        background-position: -101px -5px;
        width: 22px;
        height: 22px;
        padding-left: 25px
    }

    .haschildren.open {
        background-position: -129px -5px;
        float: left
    }

    .haschildren.close {
        background-position: -97px -5px
    }

    .tooltip {
        z-index: 1000000
    }

    #c-t-b {
        background-color: #FF9F43;
        color: #fff;
        margin-top: 1.5em;
        padding: 10px 25px;
        text-align: center;
        text-transform: uppercase;
        font-size: 1rem;
        border-radius: 4px;
        border: #FF9F43;
    }

    #c-t-b:hover {
        box-shadow: 0 0 15px #FF9F43;
        border-width: 0;
        transition: all 0.2s;
        color: #fff;
    }
</style>
@endsection
@section ('content')
<div class="scrollbar-container">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="new-form-container">
            <h1>Referrals Link</h1>
            <div class="tab-content">
                <div role="tabpanel" id="referrallink" class="fade in show">
                    <p id="p-referral">(Your referral link is below click copy and give to the
                        persons who wish to
                        make you their reference)</p>
                    <span class="referral_link" id="referral_link">{{ env('APP_URL') }}/register?referral={{ current_user()->account_id }}</span>
                    <br>
                    <button class="btn" id="c-t-b">Click to copy clipboard</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section ('page-script')
<script>
    document.getElementById('c-t-b').addEventListener('click', function () {
        let $temp = $("<input>");
        $("#referrallink").append($temp);
        $temp.val($("#referral_link").text()).select();
        document.execCommand("copy");
        $temp.remove();
        console.log('akjsagksjg');
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            icon: 'success',
            title: 'Copied successfully'
        })
    })
</script>
@endsection