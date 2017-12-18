@extends('layouts.menu')
@section('style')
    <title>Product</title>
    {{ HTML::style('css/sites/product_detail.css') }}
    {{ HTML::style('bower/bootstrap-star-rating/css/star-rating.css') }}
@endsection

@section('content')
    <div class="nastv-icon">
        <a href="#" class="navicon"></a>
        <div class="toggle">
            <ul class="toggle-menu">
                @if (Auth::guest())
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('menu')}}">Menu</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <h3>Hello {{Auth::user()->name}}</h3>
                    @if(Auth::user()->level == 1)
                        <li><a href="{{route('admin_home')}}">ADMIN</a></li>
                    @endif
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('menu')}}">Menu</a></li>
                    <li><a href="{{route('showCart')}}">Your Cart</a></li>
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

    <div id="wrapper">
        <div id="content">

            <div class="photo-wrapper">
                <div class="photo">
                    <div id='ninja-slider'>
                        <div class="slider-inner">
                            <ul>
                                @if($prd_img->count() > 0 )
                                    @foreach($prd_img as $pi)
                                        <li><a class="ns-img" href="/img/{!! $pi->image !!}"></a></li>
                                    @endforeach
                                @else
                                    <li>
                                        <a class="ns-img" href="{!! asset('img/no_image.jpg') !!}"></a>
                                    </li>
                                @endif
                            </ul>
                            <div class="fs-icon" title="Expand/Close"></div>
                        </div>
                        <div id="thumbnail-slider">
                            <div class="inner">
                                <ul>
                                    @if($prd_img->count() > 0)
                                        @foreach($prd_img as $pi)
                                            <li>
                                                <a class="thumb" href="/img/{!! $pi->image !!}"></a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <a class="thumb" href="{!! asset('img/no_image.jpg') !!}"></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="line"></div>

            <form action="{{route('addToCart',$prd_id)}}" method="POST">
                {{ csrf_field() }}
                <div id="info">
                    <div id="info-content">
                        <div id="header">
                            <h2><strong>{!! $prd_detail->name !!}</strong></h2>
                        </div>
                        <div id="return_rate">
                            @include('sites.rate')
                        </div>
                        <div class="row">
                            <p class="product-description"><span
                                        style="font-weight: bold;font-size: 1.2em">Description : </span>{!! $prd_detail->description !!}
                            </p>
                        </div>
                        <div id="left">
                            <div class="row">
                                <p class="product-description"><span
                                            style="font-weight: bold;font-size: 1.2em">Price : </span>{!! $prd_detail->price !!}
                                    <i class="fa fa-dollar"></i>
                                </p>
                            </div>
                            <div class="row">
                                <p class="product-description"><span
                                            style="font-weight: bold;font-size: 1.2em">Avability : </span>
                                    @if($prd_detail->status == 0)
                                        <span style="color: green">In stock</span>
                                    @else
                                        <span style="color: red">Out stock</span>
                                    @endif
                                </p>
                            </div>
                            <div class="row">
                                <p class="product-description"><span
                                            style="font-weight: bold;font-size: 1.2em">Quantity : </span>
                                    <input type="number" class="quantity" name="quantity" min="1" value="1">
                                </p>
                            </div>
                        </div>

                        <div id="right">
                            <div id="row">
                                <div class="action">
                                    <a href="#reviews-anchor" id="open-review-box" style="float: left">
                                        <button class="add-to-cart btn btn-success" type="button">Review Food
                                        </button>
                                    </a>
                                    <button class="add-to-cart btn btn-success" type="submit">add to cart
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div id="comment">
            <div class="row" id="comment-box">
                <div class="col-md-12" style="margin-left: 25%">
                    <div class="well well-sm">

                        <div class="row" id="post-review-box">
                            <div class="col-md-12">

                                @if(Auth::check())
                                    <form id="postComment" action="{{route('addComment')}}" method="get">
                                        <input type="hidden" id="product_1" name="product_1"
                                               value="{{$prd_detail->id}}">

                                        <textarea class="form-control animated" cols="50"
                                                  id="new-review" name="content_1"
                                                  placeholder="Enter your review here..."
                                                  rows="3" required></textarea>

                                        <div class="text-right">
                                            <form accept-charset="UTF-8">
                                                <input type="hidden" id="prd_1" value="{{$prd_detail->id}}">
                                                <input id="input-send" name="cmt_star" type="text"
                                                       class="rating" data-min="0"
                                                       data-max="5" onchange="myFunction()"
                                                       data-size="xs" data-step=0.5 value="0"
                                                       title="">

                                                <button type="button" class="btn btn-danger btn-sm"
                                                        id="close-review-box">Cancel
                                                </button>
                                            </form>
                                            <button class="btn btn-success btn-lg" id=" save-review-box"
                                                    type="submit">Save
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <div id="comment_1">
            @include("sites.comment");
        </div>

        <div id="line1"></div>

        <div class="row" style="margin-top: 25px;">
            <div class="product-other">
                <div class="row">
                    <div class="product-other-title">
                        <h2>Similar Products</h2>
                    </div>
                </div>
                <div class="row" style="width: 123%">
                    <div class="product-other-content" style="width: 90%;margin: auto;">
                        @foreach($prd_similar as $ps)
                            <div class="col-md-2 col-xs-2">
                                <a href="{{ route('product.detail', [ 'id' => $ps->id ]) }}">
                                    <img class="img-responsive" src="/img/{!! $ps->avatar !!}">
                                    <h3>{!! $ps->name !!}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/product_detail.js') }}
    {{ HTML::script('js/sites/star-rating.js')}}
    {{ HTML::script('js/sites/product_comment.js')}}
    {{ HTML::script('bower/bootbox/bootbox.js') }}
@endsection

