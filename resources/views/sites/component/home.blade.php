@extends('sites.master')
@section('style')
    {{ HTML::style('bower/animate.css/animate.css') }}
    {{ HTML::style('css/sites/icomoon.css') }}
    {{ HTML::style('bower/simple-line-icons/css/simple-line-icons.css') }}
    {{ HTML::style('bower/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::style('bower/flexslider/flexslider.css') }}
    {{ HTML::style('bower/bootstrap/dist/css/bootstrap.css') }}
    {{ HTML::style('css/sites/style.css') }}
    {{ HTML::script('js/sites/modernizr-2.6.2.min.js') }}
@endsection

@section('content')
    @include('sites.section.header')
    @include('sites.section.content') 
    @include('sites.section.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/jquery.min.js') }}
    {{ HTML::script('bower/easing/easing.js') }}
    {{ HTML::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('bower/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ HTML::script('js/sites/jquery.waypoints.min.js') }}
    {{ HTML::script('js/sites/jquery.stellar.min.js') }}
    {{ HTML::script('js/sites/jquery.flexslider-min.js') }}
    {{ HTML::script('js/sites/main.js') }}
@endsection
