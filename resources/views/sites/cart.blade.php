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
                        <li><a href="#">ADMIN</a></li>
                    @endif
                    <li><a href="{{route('home')}}">Home</a></li>
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
    <div>
        <div class="cart-header">
            <label id="title">Your Shopping Cart</label>
        </div>
        <div class="cart">
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
                                        <a href={{route('product.detail',$product->id)}}> <img class="media-object" src="../img/{{$product->avatar}}">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href={{route('product.detail',$product->id)}}>{{$product->name}}</a></h4>
                                            <h5 class="media-heading"> Type <a
                                                        href={{route('menu')}}>{{$product->category}}</a></h5>
                                            <span>Status: </span><span
                                                    class="text-success"><strong>In Stock</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <input type="number" class="qty" name="qty" value={{$product->quantity}}>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <span class="price" >${{$product->price}}</span>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center">
                                   <span id="amount" class="amount">0</span>
                                </td>
                                <td class="col-sm-1 col-md-1">
                                    <a class="remove" href={{route('deleteCart',$product->id)}}
                                       onclick="bootbox.confirm();">
                                        <i class="fa fa-fw fa-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td><h5>Subtotal</h5></td>
                            <td class="text-right"><h5><strong><span id="total" class="total"></span></strong></h5></td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td><h5>Estimated shipping</h5></td>
                            <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/homepage.js') }}
    {{ HTML::script('bower/bootbox/bootbox.js') }}
    <script>
        $('.remove').click(function (e) {
            e.preventDefault();
            var location = $(this).attr('href');
            bootbox.confirm({
                backdrop: true,
                size: 'small',
                message: "Remove this product from cart ?",
                buttons: {
                    confirm: {
                        label: '<i class="fa fa-check"></i> Sure',
                        className: 'btn-success',
                    },
                    cancel: {
                        label: '<i class="fa fa-times"></i> Hol Up',
                        className: 'btn-danger',
                    }
                },
                callback: function (result) {
                    console.log(result);
                    if (result == true) {
                        window.location.replace(location);
                    }
                },
            });
        });
        function calculator() {
        var amt = $('.amount'),
            tot = $('#total');
            console.log(amt);
        amt.text(function () {
            var tr = $(this).closest('tr');
            var qty = tr.find('.qty').val();
            var price = $('.price').text().substr(1);
            return parseFloat(qty) * parseFloat(price);
        });
        tot.text(function () {
            var sum = 0;
            amt.each(function () {
                sum += parseFloat($(this).text())
            });
            console.log(sum);
            return sum;
        });
    }
        calculator();
        $('.qty,.price').change(calculator);
        
    </script>
@endsection

