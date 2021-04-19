<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-16x16.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/img/favicon-32x32.png")}}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Bootstrap Css File -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" />
@yield('meta-data')
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-3NXQKG34G8"></script>
	<script>
            window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3NXQKG34G8');
	</script>
</head>

<body class="loading">
<!-- Pre Loader -->
<div class="spinner-wrapper">
	<div class="spinner"></div>
</div>
<div>
	@yield('content')
</div>
</body>
@yield('scripts')
<!-- Jquery Js -->
<script src="{{ asset('assets/js/jquery.3.4.1.js')}}"></script>
<!-- Custom Js -->
<script src="{{ asset('assets/js/main1.js')}}"></script>
</html>
