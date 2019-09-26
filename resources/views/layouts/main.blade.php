<!DOCTYPE html>
<html lang="en">
<head>
    <!-- html5shiv.js -->
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.js') }}"></script>
    <![endif]-->
    <!-- end of html5shiv.js -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en, my">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- essential meta tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="copyright"content="">
    <!-- open graph meta tags for social media and others -->
    <meta property="og:title" content="{{ env('APP_NAME') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:description" content="">
    <meta property="og:image" content="{{ env('APP_LOGO') }}">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <!-- if no page title, then, show only app name -->
    <title>{{ isset($pageTitle) ? $pageTitle.' - '.env('APP_NAME') : env('APP_NAME') }}</title>
    <!-- page link -->
    <link rel="icon" href="{{ asset(env('APP_LOGO')) }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <!-- Custom Style CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <!-- add navbar -->
    @include('includes.navbar')

    <!-- main content start here -->

    @yield('main')

    <!-- end of main content -->

    <!-- add footer -->
    @include('includes.footer')

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
    <!-- required on ready -->
    <script>
        $(document).ready(() => {
            if(window.innerWidth < 992) {
                $("nav .navbar-brand img").attr("src", "{{ asset(env('APP_LOGO_2')) }}");
            }
        });
    </script>
    <!-- custom js script -->
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

    <!-- 
        
    </> Coded with <3 Love by H31iUM [ Hein Thanth - https://heinthanth.com ] 

    U)    uu I)iiii T)tttttt               H)    hh  3)###  X)    xx 
    U)    uu   I)      T)                  H)    hh 3)   ##  X)  xx  
    U)    uu   I)      T)       x)   XX    H)hhhhhh    3)#    X)xx   
    U)    uu   I)      T)         x)X      H)    hh      3)   X)xx   
    U)    uu   I)      T)         x)X      H)    hh 3)   ##  X)  xx  
     U)uuuu  I)iiii    T)       x)   XX    H)    hh  3)###  X)    xx
    
    Copyright (c) {{ date('Y') }} UIT Student Union. All Rights Reserved
    
    -->

</body>
</html>