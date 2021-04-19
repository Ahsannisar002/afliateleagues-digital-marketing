<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    @yield('meta-data')
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="{{ asset('assets/css/guest_main.css') }}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Hind Vadodara:300,regular,500,600,700"]
            }
        });
    </script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif]-->
    <script type="text/javascript">
        !function (o, c) {
            var n = c.documentElement
                , t = " w-mod-";
            n.className += t + "js",
            ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <link href="{{ asset('assets/images/fav2.jpg')}}" rel="shortcut icon" type="image/x-icon"/>
    <link href="{{ asset('assets/images/fav.jpg')}}" rel="apple-touch-icon"/>
    <style>
        .page-content {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>
<body>
<div class="utility-page-wrap"><a href="/" class="brand absolute-logo w-nav-brand">
        <div class="logo-text dark">Amlaen</div>
    </a>
    <div class="utility-page-content w-form"><h1>Page Not Found</h1>
        <p>The page you are looking for doesn't exist or has been moved.</p>
        <div class="top-margin _15px"><a href="/" class="button w-button">Back Homepage</a></div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5ea70fb1c50d893eeda7ea48"
        type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/guest_main.js') }}" type="text/javascript"></script>
<!--[if lte IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
