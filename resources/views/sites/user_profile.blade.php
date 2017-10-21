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

    <div class="container bootstrap snippet background_user">
        <div class="col-sm-3 sidebar">
            <div class="row">
                <div class="img-avata-icon">
                    @if(($users->avatar) != null)
                        <img src="{!! $users->avatar !!}" class="img-responsive"/>
                    @else
                        <img src="{!! asset('/images/avata.png') !!}" class="img-responsive"/>
                    @endif
                    <a href="javascript:void(0)" class="edit-icon" data-toggle="modal"
                       data-target="#modalAvatar">
                        <i class="fa fa-pencil"></i>{{ __('edit') }}
                    </a>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->
            </div>
            <div class="row"><!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-center">Profile</li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Email</strong></span> {!! $users->email !!}</li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Phone</strong></span> {!! $users->phone !!}</li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Birthday</strong></span> {!! $users->date_of_birth !!}</li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Level</strong></span> {!! $users->level !!}</li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Address</strong></span> {!! $users->address !!}</li>
                </ul>
            </div><!--/col-3-->
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="fullname">
                    <h2>{!! $users->name !!}</h2>
                </div>
            </div>
            <div class="row">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#order" data-toggle="tab">Các đơn hàng đã đặt</a></li>
                    <li><a href="#messages" data-toggle="tab">Cronologia Appuntamenti</a></li>
                    <li><a href="#settings" data-toggle="tab">Chinh sửa thông tin </a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="order">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Thể loại</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Tổng giá tiền</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
                                    <td>25-7-105</td>
                                    <td>drink</td>
                                    <td> 5</td>
                                    <td> 5$</td>
                                    <td>25$</td>
                                    <td>
                                        <button class="btn btn-default btn-xs"><span
                                                    class="glyphicon glyphicon-eye-open"></span></button>
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
                    </div><!--/tab-pane-->

                    <div class="tab-pane" id="messages">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Servizio</th>
                                    <th>Modifica</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                <tr>
                                    <td>10.05.2017</td>
                                    <td>MASSAGGIO schiena</td>

                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#edit" data-uid="1"
                                                class="update btn btn-warning btn-sm">
                                            <span class="glyphicon glyphicon-pencil"></span></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--/tab-pane-->

                    <div class="tab-pane" id="settings">
                        <hr>
                        {{--{{ Form::open([ 'route' => 'user.edit', 'method' => 'post' ]) }}--}}
                        <form method="POST" action="{{route('user.edit',Auth::user()->id)}}">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', $users->name, [ 'class' => 'form-control name' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone', $users->phone, [ 'class' => 'form-control phone' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address', $users->address, [ 'class' => 'form-control address' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    {{ Form::label('level', 'Level') }}
                                    {{ Form::text('level', $users->level, [ 'class' => 'form-control level' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    {{ Form::label('birth', 'BirthDay') }}
                                    {{ Form::date('birth', $users->date_of_birth, [ 'class' => 'form-control birth' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save
                                    </button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                        Cancel
                                    </button>
                                </div>
                            </div>
                            {{--{{ Form::close() }}--}}
                        </form>
                    </div>
                </div><!--/tab-pane-->
            </div><!--/tab-content-->
        </div><!--/col-9-->
    </div><!--/row-->

    @include('sections.menu.footer')
@endsection

@section('script')
    {{ HTML::script('js/sites/homepage.js') }}
@endsection

