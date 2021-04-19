@extends ('Admin.layouts.app')
@section('style')
    <style type="text/css">
        .new-form-container .tab-content form .form-control {
            height: 36px;
            font-size: 13px;
            border-radius: 0;
        }
        .new-form-container .tab-content {
            padding: 36px 30px;
        }
        
        .new-form-container {
            background-color: #ffffff;
            -webkit-box-shadow: 8px 5px 17px -7px #ccc;
            box-shadow: 8px 5px 17px -7px #ccc;
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
            font-family: Lato-Bold, sans-serif;
        }
        
        .new-form-container h1:after {
            display: block;
            content: "";
            height: 6px;
            background-color: #FF9F43;
            width: inherit;
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
        @media (max-width: 575.98px) and (min-width: 320px) {
            .new-form-container .tab-content form .btn {
                font-size: 14px;
                padding: 8px 10px;
            }
        }
    </style>
@endsection
@section ('content')
    <div class="scrollbar-container">
    </div>
    <div class="new-form-container row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 pl-0">
            <h1>Transactions</h1>
            <div class="tab-content">
                <livewire:admin.transactios-search/>
            </div>
        </div>
@endsection
@section ('page-script')
@endsection