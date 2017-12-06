<div class="header">
    <div class="container">
        <div class="logo animated wow pulse" data-wow-duration="1000ms" data-wow-delay="500ms">
            <a href="" title=""><img src="{{ asset('img/logo2.svg') }}" alt="">
            </a>
        </div>
        <div class="nav-icon">
            <a href="#" class="navicon"></a>
            <div class="toggle">
                <ul class="toggle-menu">
                    @if (Auth::guest())
                        <li><a class="active" href="{{route('home')}}">Home</a></li>
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
        <div class="clearfix"></div>
    </div>
    <div class="banner">
        <p class="animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">Sed ut perspiciatis unde
            omnis iste natus.</p>
        <label></label>
        <h4 class="animated wow fadeInLeft" data-wow-duration="2000ms" data-wow-delay="100ms">Hello And Welcome To
            Food</h4>
    </div>
</div>
