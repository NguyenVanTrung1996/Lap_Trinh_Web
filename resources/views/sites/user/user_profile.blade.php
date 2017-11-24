@extends('layouts.menu')
@section('style')
    {{ HTML::style('css/sites/profile.css') }}
@endsection

@section('content')
    <div class="nav-icon">
        <a href="#" class="navicon"></a>
        <div class="toggle">
            <ul class="toggle-menu">
                @if(Auth::user()->level == 1)
                    <li><a class="active" href="#">ADMIN</a></li>
                @endif
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('menu')}}">Menu</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Contact</a></li>
                <li><a class="active" href="#">Profile</a></li>
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

    <div class="container bootstrap snippet background_user user-profile">
        <div class="col-sm-3 sidebar">
            <div class="row fix-profile-bottom">
                <div class="img-avata-icon">
                    @if((Auth::user()->avatar) != null)
                        <img src="{!! url(Auth::user()->avatar) !!}" class="img-responsive"/>
                    @else
                        <img src="{!! asset('/img/avata.png') !!}" class ="img-responsive"/>
                    @endif
                    <div class="edit-icon">
                        <a data-toggle="modal" data-target="#modalAvatar">
                            <i class="fa fa-pencil"></i> {{ __('edit') }}
                        </a>
                    </div>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->
                <div class="fullname">
                    <h2>{!! Auth::user()->name !!}</h2>
                </div>
            </div>
            <div class="row"><!--left col-->
                <ul class="list-group list-info">
                    <li class="list-group-item text-center pull">Profile</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left"><strong>Email:</strong></span> {!! Auth::user()->email !!}
                    </li>
                    <li class="list-group-item text-right">
                        <span class="pull-left"><strong>Phone :</strong></span> {!! Auth::user()->phone !!}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Birthday:</strong>
                        </span> {!! Auth::user()->date_of_birth !!}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Address:</strong>
                        </span> {!! Auth::user()->address !!}
                    </li>
                </ul>
            </div><!--/col-3-->
            <div class="row edit">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalProfile">
                    (<i class="fa fa-pencil"></i> {{ __('Edit Profile') }})
                </a>
                <a href="javascript:void(0)" class="text-center" data-toggle="modal" data-target="#modalPassword">
                    (<i class="fa fa-pencil"></i> {{ __('Edit Password') }})
                </a>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="title-thongtindonhang">Thong tin don hang</div>
            <hr>
            <div class="row">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#order-doing" data-toggle="tab">Các đơn hàng đang thực hiện</a></li>
                    <li><a href="#order-done" data-toggle="tab">Các đơn hàng đã đặt</a></li>
                    <li><a href="#order-cancel" data-toggle="tab">Các đơn hàng đã hủy</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="order-doing">
                        <div class="table-responsive status-order">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center weight-title">Thời gian</th>
                                        <th class="text-center weight-title">Tên hàng</th>
                                        <th class="text-center weight-title">Số lượng</th>
                                        <th class="text-center weight-title">Đơn giá</th>
                                        <th class="text-center weight-title">Thành tiền</th>
                                        <th class="text-center weight-title" colspan="2">Action </th>
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button type="button" class="update btn btn-warning btn-sm">Huy</button>
                                        </td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div><!--/table-resp-->
                        <hr>
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="order-done">
                        <div class="table-responsive status-order">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center weight-title">Thời gian</th>
                                    <th class="text-center weight-title">Tên hàng</th>
                                    <th class="text-center weight-title">Số lượng</th>
                                    <th class="text-center weight-title">Đơn giá</th>
                                    <th class="text-center weight-title">Thành tiền</th>
                                    <th class="text-center weight-title" colspan="2">Action </th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{!! $order->create_at !!}</td>
                                        <td class="text-center">{!! $productDetail->name !!}</td>
                                        <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                        <td class="text-center">{!! $productDetail->price !!}</td>
                                        <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                        <td>
                                            <button data-toggle="collapse" data-target="#demo1"
                                                    class="accordion-toggle btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div><!--/table-resp-->
                        <hr>
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="order-cancel">
                        <div class="table-responsive status-order">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center weight-title">Thời gian</th>
                                    <th class="text-center weight-title">Tên hàng</th>
                                    <th class="text-center weight-title">Số lượng</th>
                                    <th class="text-center weight-title">Đơn giá</th>
                                    <th class="text-center weight-title">Thành tiền</th>
                                    <th class="text-center weight-title" colspan="2">Action </th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                <tr>
                                    <td class="text-center">{!! $order->create_at !!}</td>
                                    <td class="text-center">{!! $productDetail->name !!}</td>
                                    <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                    <td class="text-center">{!! $productDetail->price !!}</td>
                                    <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                    <td>
                                        <button type="button" class="update btn btn-warning btn-sm">Đặt Lại</button>
                                    </td>
                                    <td>
                                        <button data-toggle="collapse" data-target="#demo1"
                                                class="accordion-toggle btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">{!! $order->create_at !!}</td>
                                    <td class="text-center">{!! $productDetail->name !!}</td>
                                    <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                    <td class="text-center">{!! $productDetail->price !!}</td>
                                    <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                    <td>
                                        <button type="button" class="update btn btn-warning btn-sm">Đặt Lại</button>
                                    </td>
                                    <td>
                                        <button data-toggle="collapse" data-target="#demo1"
                                                class="accordion-toggle btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">{!! $order->create_at !!}</td>
                                    <td class="text-center">{!! $productDetail->name !!}</td>
                                    <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                    <td class="text-center">{!! $productDetail->price !!}</td>
                                    <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                    <td>
                                        <button type="button" class="update btn btn-warning btn-sm">Đặt Lại</button>
                                    </td>
                                    <td>
                                        <button data-toggle="collapse" data-target="#demo1"
                                                class="accordion-toggle btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">{!! $order->create_at !!}</td>
                                    <td class="text-center">{!! $productDetail->name !!}</td>
                                    <td class="text-center">{!! $orderDetail->quantity !!}</td>
                                    <td class="text-center">{!! $productDetail->price !!}</td>
                                    <td class="text-center">{!! $productDetail->price*$orderDetail->quantity !!}</td>
                                    <td>
                                        <button type="button" class="update btn btn-warning btn-sm">Đặt Lại</button>
                                    </td>
                                    <td>
                                        <button data-toggle="collapse" data-target="#demo1"
                                                class="accordion-toggle btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="demo1">

                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div><!--/table-resp-->
                        <hr>
                    </div>
                </div><!--/tab-pane-->
            </div><!--/tab-content-->
        </div><!--/col-9-->
    </div><!--/row-->
    <!--Model edit-->
    <!--Edit avatar-->
    <div id="modalAvatar" class="modal fade" role="dialog">
        <div class="modal-dialog form-edit">
            <!-- Modal content-->
            <div class="modal-content">
                {{ Form::open([ 'route' => 'user.update.avatar', 'method' => 'post', 'files' => 'true', 'enctype' => 'multipart/form-data' ]) }}
                <div class="modal-header">
                    {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                    <h4 class="modal-title">{{ __('upload avatar') }}</h4>
                </div>
                <div class="modal-body ">
                    <div class="wrap-upload">
                        <div class="row">
                            <div class="wrap-image-upload">
                                <div class="col-md-3 col-lg-3">
                                </div>
                                <div class="col-md-6 col-lg-6 img-padding-circle image-upload" align="center">
                                    @if((Auth::user()->avatar) != null)
                                        <img alt="User Pic" id="image_target" src="{!! url(Auth::user()->avatar) !!}"
                                             class="img-circle img-responsive" width="300px" height="300px"/>
                                    @else
                                        <img alt="User Pic" id="image_target" src="{!! asset('/img/avata.png') !!}"
                                             class="img-circle img-responsive" width="300px" height="300px"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="wrap-upload-note">
                            <span><b>{{ __('Note') }}:
                                {{ __("Image's size recomment: width and width less than 350px") }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::file('image_upload', [ 'id' => 'edit_photo' ]) }}
                    {{ Form::submit('Save', [ 'id' => 'submit_photo', 'class' => 'btn btn-success' ]) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- //end dialog edit avatar-->
    {{--<!-- dialog edit information-->--}}
    <div id="modalProfile" class="modal fade" role="dialog">
        <div class="modal-dialog form-edit">
            <!-- Modal content-->
            <div class="modal-content">
                {{ Form::open([ 'route' => 'user.edit.profile', 'method' => 'post' ]) }}
                <div class="modal-header">
                    {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                    <h4 class="modal-title">{{ __('edit profile') }}</h4>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            {{ Form::label('name', __('Name:')) }}
                            {{ Form::text('name', Auth::user()->name,
                                [ 'class' => 'form-control display_name' ])
                            }}
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            {{ Form::label('gender', __('Gender:')) }}
                            {{ Form::select('gender',
                                [
                                    'male' => __('male'),
                                    'female' => __('female'),
                                    'other' => __('other')
                                ],
                                Auth::user()->gender,
                                [ 'class' => 'form-control' ])
                            }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-xs-12">
                            {{ Form::label('date_of_birth', __('Birthday:')) }}
                            {{ Form::date('date_of_birth', Auth::user()->date_of_birth, [ 'class' => 'form-control date_of_birth' ]) }}
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            {{ Form::label('phone', __('Phone:')) }}
                            {{ Form::text('phone', Auth::user()->phone, [ 'class' => 'form-control phone' ]) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            {{ Form::label('address', __('Address:')) }}
                            {{ Form::text('address', Auth::user()->address, [ 'class' => 'form-control address' ]) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Save', [ 'class' => 'btn btn-success' ]) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    {{--<!--//end edit information -->--}}
    {{--<!-- dialog edit password-->--}}
    {{--<div id="modalPassword" class="modal fade" role="dialog">--}}
        {{--<div class="modal-dialog form-edit">--}}
            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--{{ Form::open([ 'route' => 'change.password', 'method' => 'post' ]) }}--}}
                {{--<div class="modal-header">--}}
                    {{--{{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}--}}
                    {{--<h4 class="modal-title">{{ __('edit password') }}</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body ">--}}
                    {{--<form>--}}
                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('old_password', __('old password')) }}--}}
                            {{--{{ Form::password('old_password',--}}
                                {{--[--}}
                                {{--'class' => 'form-control',--}}
                                {{--'placeholder' => 'old password'--}}
                                {{--]--}}
                            {{--) }}--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('new_password', __('new password')) }}--}}
                            {{--{{ Form::password('new_password',--}}
                                {{--[--}}
                                {{--'class' => 'form-control',--}}
                                {{--'placeholder' => 'new password'--}}
                                {{--]--}}
                            {{--) }}--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('confirm', __('confirm password')) }}--}}
                            {{--{{ Form::password('confirm',--}}
                                {{--[--}}
                                {{--'class' => 'form-control',--}}
                                {{--'placeholder' => 'confirm password'--}}
                                {{--]--}}
                            {{--) }}--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button class="btn btn-success user-change-password">{{ __('change') }}</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--{{ Form::close() }}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- //end dialog edit password-->--}}
    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/homepage.js') }}
@endsection

