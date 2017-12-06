<!DOCTYPE HTML>
<HTML lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    {{ HTML::style('/bower/bootstrap/dist/css/bootstrap.css') }}
    {{ HTML::style('/bower/owl.carousel/dist/assets/owl.carousel.css') }}
    {{ HTML::style('/bower/owl.carousel/dist/assets/owl.theme.default.css') }}
    {{ HTML::style('/bower/owl.carousel/dist/assets/owl.theme.default.css') }}
    {{ HTML::style('/bower/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('/css/sites/homepage.css') }}
    {{ HTML::style('/css/sites/menu.css') }}
    {{ HTML::style('/css/sites/reset.css') }}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
    @yield('style')
</head>
<body>
    <div class="container-fluid fix-width"  id="content_menu">
        @yield('content')
    </div>
    {{ HTML::script("bower/vue/dist/vue.js") }}    
    {{ HTML::script("bower/axios/dist/axios.min.js") }}    
    {{ HTML::script('bower/jquery/dist/jquery.js') }}
    {{ HTML::script('bower/bootstrap/dist/js/bootstrap.js') }}
    {{ HTML::script('bower/owl.carousel/dist/owl.carousel.min.js') }}
    {{ HTML::script('js/sites/menu.js') }}
    {{ HTML::script('bower/vue2-filters/dist/vue2-filters.js') }}
    <script>
        $(document).ready(function () {
            $('#logout-1').on('click', function () {
                $('#logout-form').submit();
            });
        });
    </script>
@yield('script')
</body>
</HTML>
