@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {!! Form::open(['role' => 'form','class'=>'form-horizontal','method' =>'POST','route'=>'register']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::input('text','name',old('name'),['id'=>'name','class'=>'form-control','autofocus'=>'true']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::input('email','email',old('email'),['id'=>'email','class'=>'form-control','autofocus'=>'true']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::input('password','password',null,['id'=>'password','class'=>'form-control']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password-confirm', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::input('password','password_confirmation',null,['id'=>'password-confirm','class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                        <hr>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
