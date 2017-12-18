@extends('layouts.menu')
@section('style')
    <title>Profile</title>
    {{ HTML::style('css/sites/profile.css') }}
@endsection

@section('content')
    <?php
    $i = 1;
    ?>
    <div class="nav-icon">
        <a href="#" class="navicon"></a>
        <div class="toggle">
            <ul class="toggle-menu">
                <h3>Hello {{Auth::user()->name}}</h3>
                @if(Auth::user()->level == 1)
                    <li><a href="{{route('admin_home')}}">ADMIN</a></li>
                @endif
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('menu')}}">Menu</a></li>
                <li><a href="{{route('showCart')}}">Your Cart</a></li>
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

    <div class="container bootstrap snippet background_user user-profile" style="height: 700px">
        <div class="col-sm-3 sidebar" style="width: 31% !important;">
            <div class="row fix-profile-bottom">
                <div class="img-avata-icon">
                    @if((Auth::user()->avatar) != null)
                        <img src="{!! url(Auth::user()->avatar) !!}" class="img-responsive"/>
                    @else
                        <img src="{!! asset('/img/user.png') !!}" class="img-responsive"/>
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
            <div class="row edit" style="text-align: center">
                <a data-toggle="modal" data-target="#modalProfile">
                    (<i class="fa fa-pencil"></i> {{ __('Update Profile') }})
                </a>
                <a href="javascript:void(0)" class="text-center" data-toggle="modal" data-target="#modalPassword"
                   style="margin-left: 5px;">
                    (<i class="fa fa-pencil"></i> {{ __('Change Password') }})
                </a>
            </div>
        </div>
        <div class="col-sm-8" style="margin-left: 25px;">
            <div class="title-thongtindonhang">Purchase History</div>
            <hr>
            <div class="row">

                <div id="content">
                    <div id="tab1">
                        <div class="table-responsive status-order" style="border-radius: 10px;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center weight-title">Order No.</th>
                                    <th class="text-center weight-title">Time</th>
                                    <th class="text-center weight-title">Products</th>
                                    <th class="text-center weight-title">Total</th>
                                    <th class="text-center weight-title">Status</th>
                                    <th class="text-center weight-title">Action</th>
                                </tr>
                                </thead>
                                @foreach($orders as $order)
                                    <tbody id="items">
                                    <td>{{$i++}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->product_count}}</td>
                                    <td>${{$order->sum}}</td>
                                    <td class="text-center">
                                        @if($order->status == "inprogress" )
                                            <div class="btn btn-info" style="width: 120px">{{$order->status}}</div>
                                        @elseif($order->status == "waiting")
                                            <div class="btn btn-warning" style="width: 120px" >{{$order->status}}</div>
                                        @elseif($order->status == "complete")
                                            <div class="btn btn-success" style="width: 120px" >{{$order->status}}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="aaa">
                                            <a class="orderID" href="javascript:void(0)" data-toggle="modal"
                                               data-target="#modalOrder"
                                               data-id="{{$order->id}}">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            <input class="inputID" type="hidden" value="{{$order->id}}" name="orderID">
                                        </div>
                                    </td>
                                    </tbody>
                                @endforeach
                                <tr></tr>
                            </table>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div><!--/table-resp-->
                        <hr>
                    </div>
                </div>
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
                                [ 'class' => 'form-control display_name',     'required' => 'required', ])
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
                            {{ Form::date('date_of_birth', Auth::user()->date_of_birth, [ 'class' => 'form-control date_of_birth',     'required' => 'required', ]) }}
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            {{ Form::label('phone', __('Phone:')) }}
                            {{ Form::text('phone', Auth::user()->phone, [ 'class' => 'form-control phone',     'required' => 'required', ]) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            {{ Form::label('address', __('Address:')) }}
                            {{ Form::text('address', Auth::user()->address, [ 'class' => 'form-control address',     'required' => 'required', ]) }}
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
    <div id="modalPassword" class="modal fade" role="dialog">
        <div class="modal-dialog form-edit">
            <!-- Modal content-->
            <div class="modal-content">
                {{ Form::open([ 'route' => 'user.change.password', 'method' => 'post' ]) }}
                <div class="modal-header">
                    {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                    <h4 class="modal-title">{{ __('edit password') }}</h4>
                </div>
                <div class="modal-body ">
                    <form>
                        <div class="form-group">
                            {{ Form::label('old_password', __('Old password:')) }}
                            {{ Form::password('old_password',
                                [
                                'class' => 'form-control',
                                'placeholder' => 'enter old password',
                                'required' => 'required',
                                ]
                            ) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_password', __('New password:')) }}
                            {{ Form::password('new_password',
                                [
                                'class' => 'form-control',
                                'placeholder' => 'enter new password',
                                'required' => 'required',
                                ]
                            ) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('confirm', __('Confirm password:')) }}
                            {{ Form::password('confirm',
                                [
                                'class' => 'form-control',
                                'placeholder' => 'confirm',
                                'required' => 'required',
                                ]
                            ) }}
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button class="btn btn-success user-change-password">{{ __('Change') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    {{--<!-- //end dialog edit password-->--}}


    <div id="modalOrder" class="modal fade" role="dialog">
        <div class="modal-dialog order">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                    <h4 class="modal-title">{{ __('order detail') }}</h4>
                </div>
                <div class="modal-body" id="result" style="padding: 0 15px 15px 15px !important;">
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('bower/jquery-1.12.4/index.js')}}
    {{ HTML::script('bower/jquery-ui/jquery-ui.js') }}
    {{ HTML::script('js/sites/page_menu.js') }}
@endsection
