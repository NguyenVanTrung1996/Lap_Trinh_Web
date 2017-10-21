@extends('layouts.menu')
@section('style')
@endsection

@section('content')
    @include('sections.menu.header')

    <div class="nav-icon">
        <a href="#" class="navicon"></a>
        <div class="toggle">
            <ul class="toggle-menu">
                @if (Auth::guest())
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('menu')}}">Menu</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <h3>Hello {{Auth::user()->name}}</h3>
                    @if(Auth::user()->level == 1)
                        <li><a class="active" href="#">ADMIN</a></li>
                    @endif
                    <li><a class="active" href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('menu')}}">Menu</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Profile</a></li>
                    <li>
                        <a href="javascript:void(0)" id="logout-1">
                            Logout
                        </a>
                        {!! Form::open(['role'=>'form', 'route'=> 'logout', 'method'=>'POST', 'id'=>'logout-form']) !!}
                        {{ csrf_field() }}
                        {!! Form::close() !!}
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper">
                    <div class="preview col-md-5">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="http://lorempixel.com/300/300/animals/"/>
                            </div>
                            <div class="tab-pane" id="pic-2"><img src="http://lorempixel.com/300/300/animals/"/></div>
                            <div class="tab-pane" id="pic-3"><img src="http://lorempixel.com/300/300/animals/"/></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs" id="myTab">
                            <li class="active"><a href="#pic-1" data-target="#pic-1" data-toggle="tab">
                                    <img src="http://lorempixel.com/200/126/animals/"/></a>
                            </li>
                            <li><a href="#pic-2" data-target="#pic-2" data-toggle="tab">
                                    <img src="http://lorempixel.com/200/126/animals/"/></a>
                            </li>
                            <li><a href="#pic-3" data-target="#pic-3" data-toggle="tab">
                                    <img src="http://lorempixel.com/200/126/animals/"/></a>
                            </li>
                        </ul>
                    </div>
                    <div class="details col-md-7">
                        <div class="row">
                            <h3 class="product-title">{!! $prd_detail->name !!}</h3>
                        </div>
                        <div class="row">
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                        </div>
                        <div class="row">
                            <p class="product-description">{!! $prd_detail->description !!}</p>
                        </div>
                        <div class="row">
                            <h4 class="price">current price: <span>{!! $prd_detail->price !!}</span><i
                                        class="fa fa-dollar"></i></h4>
                            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87
                                    votes)</strong></p>
                        </div>
                        <div class="row">
                            <div class="action">
                                <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <h2>San pham tương tu</h2>
        </div>
    </div>

    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/homepage.js') }}
@endsection

