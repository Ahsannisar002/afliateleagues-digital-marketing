@extends ('layouts.app')
@section('style')
<style type="text/css">
    .profile-section {
        padding-left: 30px
    }

    .user-profile-upper {
        background-image: url({{ asset('assets/images/layer.png') }});
        background-repeat: repeat-x;
        background-position: 0 0;
        width: 100%;
        padding: 30px;
        background-color: #f8f9fb;
        border: 1px solid #dcdcdc
    }

    .user-profile-upper-name {
        color: #fff;
        font-size: 26px;
        text-transform: capitalize;
        padding-top: 18px
    }

    .user-profile-upper-update {
        padding-top: 8px
    }

    .user-upload-image-preview .vue-cropper {
        background-image: none !important
    }

    .user-profile-upper-image .user-image-inner {
        height: 200px;
        width: 200px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-shadow: 0 0 17px 3px rgba(0, 0, 0, .1);
        box-shadow: 0 0 17px 3px rgba(0, 0, 0, .1);
        background-color: #fff
    }

    .user-profile-upper-image .user-image-inner img {
        background-color: #fff
    }

    .user-profile-upper-update .btn {
        background-color: #FF9F43;
        font-size: 18px;
        padding: 8px 32px;
        border: 1px solid #FF9F43;
        color: #fff;
        text-transform: capitalize;
    }

    .user-profile-upper .user-info-section {
        padding-top: 76px
    }

    .user-profile-upper .user-info-section .user-info-line {
        padding-top: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #dbdddc;
        overflow: hidden
    }

    .user-profile-upper .user-info-section {
        padding-left: 0;
        padding-right: 0
    }

    .user-profile-upper .user-info-section .user-info-line .user-info-line-label {
        color: #555557;
        float: left;
        width: 140px;
        padding-right: 10px;
        font-size: 15px
    }

    .user-profile-upper .user-info-section .user-info-line .user-info-line-label-info {
        color: #9a9a9a;
        font-size: 15px
    }

    .user-info-line-label-info {
        text-align: right
    }

    .alert-success p {
        margin-bottom: 0
    }
    .inherit{
        width: inherit;
        width: -moz-available;
        height: inherit;
    }

    @media (min-width:320px) and (max-width:575.98px) {
        .user-profile-upper .user-profile-upper-image {
            text-align: center
        }

        .user-profile-upper .user-profile-upper-image .user-image-inner {
            margin: 0 auto
        }

        .user-profile-right-info .user-profile-upper-name {
            text-align: center;
            color: #10163a;
            padding-top: 15px
        }

        .user-profile-upper-update {
            text-align: center !important
        }

        .user-profile-upper .user-info-section {
            padding-top: 20px
        }

        .profile-section {
            padding-left: 15px
        }

        .user-profile-upper .user-info-section .user-info-line .user-info-line-label {
            font-size: 14px
        }

        .user-profile-upper .user-info-section .user-info-line .user-info-line-label-info {
            width: 80px;
            word-wrap: break-word;
            font-size: 14px
        }
    }

    @media (min-width:576px) and (max-width:767.98px) {
        .user-profile-upper .user-profile-upper-image {
            text-align: center
        }

        .user-profile-upper .user-profile-upper-image .user-image-inner {
            margin: 0 auto
        }

        .user-profile-right-info .user-profile-upper-name {
            text-align: center;
            color: #10163a;
            padding-top: 15px
        }

        .user-profile-upper-update {
            text-align: center !important
        }

        .user-profile-upper .user-info-section {
            padding-top: 20px
        }

        .pictureBox {
            width: 132px;
            height: 129px
        }

        .pictureBox-inner {
            height: 120px
        }
    }

    @media (min-width:768px) and (max-width:991.98px) {
        .user-profile-upper-image .user-image-inner {
            width: auto;
            height: 130px
        }

        .user-profile-upper-name h2 {
            font-size: 22px
        }

        .user-profile-upper-update .btn {
            font-size: 16px;
            padding: 7px 28px 4px
        }
    }

    @media (min-width:992px) and (max-width:1199.98px) {
        .user-profile-upper-image .user-image-inner {
            width: auto;
            height: 160px
        }
    }
</style>
@endsection
@section ('content')
<div class="scrollbar-container">
</div>
<div class="row">
    <div class="user-profile-upper">
        <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-12 user-profile-upper-image">
                <div class="user-image-inner"><img src="@if(current_user()->user_file){{ asset('storage/'.current_user()->user_file) }}@else{{ 'https://ui-avatars.com/api/?size=512&background=10163a&color=fff&name=' .  current_user()->name }} @endif" class="inherit"></div>
            </div>
            <div class="col-xl-10 col-md-8 col-sm-12 user-profile-right-info ">
                <div class="row">
                    <div class="col-xl-8 col-md-8 col-sm-12 user-profile-upper-name pl">
                        <h2>{{ current_user()->name }}</h2>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-12 user-profile-upper-update text-right"><a href="{{ url('/profile/edit') }}" class="btn btn-default">Edit</a></div>
                </div>
                <div class="user-info-section col-xl-12 col-md-12 col-sm-12 col-lg-12">
                    <div class="user-info-line row">
                        <div class="user-info-line-label col-md-4 col-sm-4 col-xs-4">Account No
                            (Your):</div>
                        <div class="user-info-line-label-info col-md-8 col-sm-8 col-xs-8">
                            <span>{{ current_user()->account_id }}</span>
                        </div>
                    </div>
                    <div class="user-info-line row">
                        <div class="user-info-line-label col-md-4 col-sm-4 col-xs-4">Parent Account
                            No:</div>
                        <div class="user-info-line-label-info col-md-8 col-sm-8 col-xs-8">
                            <span>{{ current_user()->sponsor }}</span>
                        </div>
                    </div>
                    <!---->
                    <div class="user-info-line row">
                        <div class="user-info-line-label col-md-4 col-sm-4 col-xs-4">User Name:
                        </div>
                        <div class="user-info-line-label-info col-md-8 col-sm-8 col-xs-8">{{ current_user()->username }}
                        </div>
                    </div>
                    <div class="user-info-line row">
                        <div class="user-info-line-label col-md-4 col-sm-4 col-xs-4">Full Name:
                        </div>
                        <div class="user-info-line-label-info col-md-8 col-sm-8 col-xs-8">{{ current_user()->name }}</div>
                    </div>
                    <div class="user-info-line row">
                        <div class="user-info-line-label col-md-4 col-sm-4 col-xs-4">Account Status:
                        </div>
                        <div class="user-info-line-label-info col-md-8 col-sm-8 col-xs-8 text-capitalize">
                            <span>
                                @if(current_user()->status === 1)
                                    Active
                                @else
                                    Unactive
                                @endif
                            </span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section ('page-script')
@endsection