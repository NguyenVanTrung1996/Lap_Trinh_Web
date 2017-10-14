<!DOCTYPE html>
<html>
<head>
    <title>Food & Drink </title>
    {{HTML::style('bower/bootstrap/dist/css/bootstrap.min.css')}}
    <script src="//code.jquery.com/jquery.js"></script>
    {{HTML::style('bower/bootstrap/dist/js/bootstrap.min.js')}}
    {{ HTML::style('css/sites/homepage.css') }} 
    <link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    @yield('style')
</head>
<body>
    @yield('content')
    {{-- @include('sites.header') --}}
    {{ HTML::script('js/sites/homepage.js') }} 
     @yield('script') 
</body>   
</html>
