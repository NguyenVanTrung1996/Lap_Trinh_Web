@extends('layouts.menu')
@section('style')
@endsection
{{ HTML::style('css/sites/bootstrap-responsive.min.css') }}
{{ HTML::style('css/sites/search-list.css') }}
@section('content')

    <div class="nastv-icon">
        <a href="#" class="navicon"></a>
        <div class="toggle">
            <ul class="toggle-menu">
                @if (Auth::guest())
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a class="active" href="{{route('menu')}}">Menu</a></li>
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
                    <li><a href="{{route('user.profile',Auth::user()->id)}}">Profile</a></li>
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
    @include('sections.menu.header')
    <div id="work" class="page">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">Show Food </h2>
                        <h3 class="title-description">Check Out Our Projects on <a href="#">Dribbble</a>.</h3>
                    </div>
                    <div id='cssmenu'>
                        <ul>
                            <li class='active has-sub'><a href='#'><span>Products</span></a>
                                <ul>
                                    <li class='has-sub'><a href='#'><span>Product 1</span></a>
                                        <ul>
                                            <li><a href='#'><span>Sub Product</span></a></li>
                                            <li class='last'><a href='#'><span>Sub Product</span></a></li>
                                        </ul>
                                    </li>
                                    <li class='has-sub'><a href='#'><span>Product 2</span></a>
                                        <ul>
                                            <li><a href='#'><span>Sub Product</span></a></li>
                                            <li class='last'><a href='#'><span>Sub Product</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row fix-height-menu">
                <section id="projects">
                    <ul id="thumbs">
                        <li v-for="food in foods" class="item-thumbs span3 design">
                            <h1 class="name-product">@{{ food.name }}</h1>
                            <h3 class="price-product text-right">$@{{food.price | currency('',0)}} <sup>đ</sup></h3>
                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" v-bind:href="'http://localhost:8000/product/'+food.id">
                                <span class="overlay-img"></span>
                                <span class="overlay-img-thumb btn_mua">
                                <div class="btn"><b>Mua Ngay</b></div>
                            </span>
                            </a>
                            <img v-bind:src="url+food.avatar" alt="">
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <div class="text-center bottom-pagination ">
        <nav>
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li v-for="pageNo in last_page_food "><a @click="show_food(pageNo)">@{{ pageNo }}</a></li>
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        </ul>
    </nav>
    </div>
    <div id="work" class="page">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">Show Drink </h2>
                        <h3 class="title-description">Check Out Our Projects on <a href="#">Dribbble</a>.</h3>
                    </div>
                </div>
            </div>
            <div class="row fix-height-menu" >
                <section id="projects">
                    <ul id="thumbs">
                        <li v-for="drink in drinks" class="item-thumbs span3 design">
                            <h1 class="name-product">@{{ drink.name }}</h1>
                            <h3 class="price-product text-right">$@{{drink.price| currency('',0)}} <sup>đ</sup></h3>
                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" v-bind:href="'http://localhost:8000/product/'+drink.id">
                                <span class="overlay-img"></span>
                                <span class="overlay-img-thumb btn_mua">
                                <div class="btn"><b>Mua Ngay</b></div>
                            </span>
                            </a>
                            <img v-bind:src="url+drink.avatar">
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <div class="text-center bottom-pagination ">
        <nav>
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li v-for="pageNo in last_page_drink "><a @click="show_drink(pageNo)">@{{ pageNo }}</a></li>
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        </ul>
    </nav>
    </div>
    <div id="about" class="page-alternate">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">About Us</h2>
                        <h3 class="title-description">Learn About our Team &amp; Culture.</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span4 profile">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text-thumb">CTO/Founder</span>
                        </div>
                        <img src="../img/cherf1.png" alt="John Doe">
                    </div>
                    <h3 class="profile-name">John Doe</h3>
                    <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac
                        augue at erat <a href="#">hendrerit dictum</a>.
                        Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus
                        diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                        himenaeos.</p>
                </div>
                <div class="span4 profile">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text-thumb">Creative Director</span>
                        </div>
                        <img src="../img/cherf2.jpg" alt="Jane Helf">
                    </div>
                    <h3 class="profile-name">Jane Helf</h3>
                    <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac
                        augue at erat <a href="#">hendrerit dictum</a>.
                        Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus
                        diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                        himenaeos.</p>
                    <div class="social">
                        <ul class="social-icons">
                            <li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                            <li><a href="#"><i class="font-icon-social-email"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span4 profile">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text-thumb">Lead Designer</span>
                        </div>
                        <img src="../img/cherf6.jpg" alt="Joshua Insanus">
                    </div>
                    <h3 class="profile-name">Joshua Insanus</h3>
                    <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac
                        augue at erat <a href="#">hendrerit dictum</a>.
                        Praesent porta, purus eget sagittis imperdiet, nulla mi ullamcorper metus, id hendrerit metus
                        diam vitae est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                        himenaeos.</p>
                    <div class="social">
                        <ul class="social-icons">
                            <li><a href="#"><i class="font-icon-social-twitter"></i></a></li>
                            <li><a href="#"><i class="font-icon-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="font-icon-social-google-plus"></i></a></li>
                            <li><a href="#"><i class="font-icon-social-vimeo"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/homepage.js') }}
    {{ HTML::script('js/sites/page_menu.js') }}
@endsection

