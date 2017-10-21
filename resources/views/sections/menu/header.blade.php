<div class="header-menu"></div>
<div class="header-first">
    <div class="col-md-3"><img src="../img/logo2.svg" alt=""></h3></div>
    <div class="col-md-6 header-navbar"><input class="flipkart-navbar-input col-xs-11" type="text"
                                               placeholder="Search for Products, Brands and more" name="">
        <button class="flipkart-navbar-button col-xs-1">
            {{ __('Search') }}
        </button>
    </div>
    <div class="col-md-2 phone-navbar">
        <nav class="nav-right pull-right">
            <ul class="nav-top1">
                <li><i class="fa fa-phone" aria-hidden="true"></i>
                    <a href=""> {{ __('1900 8193') }}</a>
                </li>
                @if(Auth::user())
                    <li> |
                        <a href=""> Hi {{Auth::user()->name}}</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="header-navbar-btn">
        <a href="" class="cart-button">
            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i><span class="item-number ">{{__('0') }}</span>
        </a>
    </div>
</div>
