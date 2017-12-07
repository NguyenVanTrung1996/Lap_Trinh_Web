@extends('layouts.menu')
@section('style')
@endsection
{{ HTML::style('css/sites/bootstrap-responsive.min.css') }}
{{ HTML::style('css/sites/cart.css') }}
@section('content')

    <div class="nastv-icon">
        <a href="#" class="navicon"></a>
        <div class="toggle">
            <ul class="toggle-menu">
                <h3>Hello {{Auth::user()->name}}</h3>
                @if(Auth::user()->level == 1)
                    <li><a href="#">ADMIN</a></li>
                @endif
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('menu')}}">Menu</a></li>
                <li><a class="active" href="{{route('showCart')}}">Your Cart</a></li>
                <li><a href="{{route('user.profile',Auth::user()->id)}}">Profile</a></li>
                <li>
                    <a href="javascript:void(0)" id="logout-1">
                        Logout
                    </a>
                    {!! Form::open(['role'=>'form', 'route'=> 'logout', 'method'=>'POST', 'id'=>'logout-form']) !!}
                    {{ csrf_field() }}
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>

    </div>

    @include('sections.menu.header')
    <div style="min-height: 74%">
        @if($count == 0)
            <div class="cart-header">
                <label id="title">Your Shopping Cart</label>
            </div>
            <div class="cart-header">
                <label id="title1" style="font-size: 4em">Nothing Here</label>
            </div>

        @else
            <div class="cart-header">
                <label id="title">Your Shopping Cart</label>
            </div>
            <div class="cart" id="cart">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="product-col">Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a href={{route('product.detail',$product->id)}}> <img class="media-object"
                                                                                                   src="../img/{{$product->avatar}}">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a
                                                            href={{route('product.detail',$product->id)}}>{{$product->name}}</a>
                                                </h4>
                                                <h5 class="media-heading"> Type : <a
                                                            href={{route('menu')}}>{{$product->category}}</a></h5>
                                                <span>Status : </span><span
                                                        class="text-success"><strong>In Stock</strong></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="number" class="qty" name="qty" value={{$product->quantity}}>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <span class="price">${{$product->price}}</span>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <span id="amount" class="amount">0</span>
                                    </td>
                                    <td class="col-sm-1 col-md-1">


                                        <a class="remove" href={{route('deleteCart',$product->id)}}
                                                onclick="bootbox.confirm();">
                                            <button data-bb-handler="cancel" type="button" class="btn btn-danger"><i
                                                        class="fa fa-times" style="margin-right: 10px"></i>Remove
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="cart">
                <div class="ttl" style="width: 20%;margin-top: 2.5%;">
                    <h3><strong>Total : </strong></h3>
                </div>
                <div class="ttl" style="width: 20%;margin-top: 2.5%;">
                    <h3><strong>$<span id="total" class="total"></span></strong></h3>
                </div>
                <div class="ttl" style="width: 50%">
                    <a href={{route('menu')}}>
                        <button type="button" class="btn btn-default"
                                style="font-size: 18px !important;float: left;margin-left: 27%">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button>
                        <button type="button" class="btn btn-success"
                                style="font-size: 18px !important;padding: 5px !important;float: right; margin-right: 15%;">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/homepage.js') }}
    {{ HTML::script('js/sites/cart.js') }}
    {{ HTML::script('bower/bootbox/bootbox.js') }}
@endsection

