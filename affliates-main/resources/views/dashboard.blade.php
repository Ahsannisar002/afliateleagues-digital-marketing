@extends ('layouts.app')

@section('title')
    <title>Dashboard - Affliates leagues</title>
@endsection
@section('style')
    <style>
        /* Section  */
        .bg-analytics {
            background: #00a5d4 !important;
        }
        
        #dashboard-analytics .img-left {
            max-width: 175px;
            position: absolute;
            top: 0;
            left: 0;
        }
        
        #dashboard-analytics .img-right {
            max-width: 175px;
            position: absolute;
            top: 0;
            right: 0;
        }
        
        #dashboard-analytics .bg-analytics .avatar {
            margin-bottom: 2rem;
        }
        
        .avatar {
            white-space: nowrap;
            background-color: #C3C3C3;
            position: relative;
            cursor: pointer;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            font-size: .75rem;
            text-align: center;
            border-radius: 50%;
            margin: 5px;
        }
        
        .avatar.avatar-xl .avatar-content,
        .avatar.avatar-xl img {
            height: 70px;
            width: 70px;
        }
        
        .c-wraper {
            min-height: 130px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 2em 0;
        }
        
        .c-wraper h2,
        .c-wraper h2 i {
            color: #7367f0;
            font-weight: 600;
        }
        
        .c-wraper p {
            color: #10163a;
            font-size: 1.2rem;
            margin-left: 1.3em;
        }
        
        .user-inner {
            height: 246px;
        }
        
        .username-right-detail {
            padding-left: 1.5em;
            padding-top: 1.5em;
            margin-bottom: 14px;
        }
        
        .username-right-card {
            overflow: hidden;
            padding-bottom: 10px;
        }
        
        .label {
            float: left;
            width: 162px;
            color: #999;
            font-size: 15px;
        }
        
        .btn-primary {
            border-color: #00a5d4 !important;
            background-color: #00a5d4 !important;
            color: #FFF;
        }
        
        .label-info {
            font-size: 15px;
            color: #555;
            padding-left: 5px;
            overflow: hidden;
        }
        
        .user-update {
            padding-left: 25px;
            font-size: 15px;
            color: #fff;
            margin-bottom: 1em;
        }
        
        .user-update a {
            background-color: #FF9F43;
            color: #fff;
            padding: 10px 25px;
            width: 150px;
            text-align: center;
            text-transform: uppercase;
            font-size: 1rem;
            border-radius: 4px;
        }
        
        .user-update a:hover {
            box-shadow: 0 0 15px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }
        
        .user-detail-buttons.text-center {
            padding-left: 0;
        }
        
        .user-detail-right-section .user-detail-buttons {
            padding-right: 0;
        }
        
        .user-detail-buttons .btn.btn-success {
            background-color: #7367F0;
            border: 1px solid #7367F0;
        }
        
        .text-primary{
            color: #00a5d4 !important;
        }
        
        .user-detail-right-section .user-detail-buttons .btn {
            font-size: 24px !important;
            padding: 12px 25px !important;
            width: 224px !important;
            margin-right: 1px !important;
            margin-bottom: 20px !important;
        }
        
        /*@media (min-width: 530px) {*/
        /*    .db-sm-none {*/
        /*        display: none;*/
        /*    }*/
        /*}*/
        
        @media (min-width: 1697px) {
            .user-inner {
                height: 220px;
            }
        }
        
        @media (max-width: 576px) {
            .img-right {
                width: 130px;
            }
            
            .img-left {
                width: 130px;
            }
        }
        
        @media (max-width: 1200px) {
            .user-inner {
                height: 216px;
            }
        }
    </style>
@endsection
@section ('content')
    <div class="scrollbar-container">
    </div>
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-xl-5 col-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{ asset ('assets/img/decore-left.png') }}" class="img-left" alt="
                                      card-img-left">
                            <img src="{{ asset ('assets/img/decore-right.png') }}" class="img-right" alt="
                                      card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="fal fa-award white fa-3x pt-3"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">Hi, {{ current_user()->name }}</h1>
                                <p class="m-auto w-75">Let's <strong>Take</strong> your
                                    <strong>Earnings</strong> to next level, And it depends on your
                                    <strong>Effort</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="user-inner">
                        <div class="username-right-detail">
                            <div class="username-right-card">
                                <div class="label">Joining Date :</div>
                                <div class="label-info">{{current_user()->created_at->format('d M Y') }}</div>
                            </div>
                            <div class="username-right-card">
                                <div class="label">Last Login :</div>
                                <div class="label-info">{{ Carbon\Carbon::parse(current_user()->last_logged_at)->format('d M Y') }}</div>
                            </div>
                            <div class="username-right-card">
                                <div class="label"> Package Type :</div>
                                <div class="label-info">{{ current_user()->membership()->name }}</div>
                            </div>
                        </div>
                        <div class="user-update">
                            <a href="{{ route('membership.create') }}" class="nav-link">Upgrade
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="user-inner">
                        <div class="row-cols-3 pt-4 pb-4">
                            <div class="col-12">
                                <a href="{{ route('profile') }}" class="btn btn-primary btn-block mb-3">
                                    Edit Profile
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('courses.index') }}" class="btn btn-success btn-block mb-3">
                                    Courses
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="{{ url('/network/referral-link') }}" class="btn btn-primary btn-block">
                                    Referral Link
                                </a> <br class="db-sm-none">
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
    
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Earning Balance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format(current_user()->balance->main_balance, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Group Earning</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format(current_user()->balance->group_balance, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Today's</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format($todayEarning, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Yesterday</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format($yesterdayEarning, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Last 7 day's</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format($last7Earning, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Last 30 day's</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format($last7Earning, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Last 365 day's</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fal fa-dollar-sign font-weight-bold text-gray-800 mr-2"></i>{{ number_format($last365Earning, 6 , '.', ',') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Direct Members</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count(current_user()->referrals) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-xl-4 col-md-6">--}}
{{--                <div class="card border-left-primary shadow py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Indirect Members</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fal fa-users fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4 col-md-6">--}}
{{--                <div class="card border-left-primary shadow py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Profiles I Followed</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $profilesFollowed }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fal fa-user fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4 col-md-6">--}}
{{--                <div class="card border-left-primary shadow py-2">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Channels I Subscribed</div>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subscribedChannels }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fal fa-bell fa-2x text-gray-300"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-xl-4 col-md-6">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">CURRENT PACKAGE</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">{{ current_user()->membership()->name }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fal fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
