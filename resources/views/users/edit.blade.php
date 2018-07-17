@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- <div class="col-md-8 col-md-offset-2"> -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <!-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
                <div class="panel-body">

                    <div class="row text-center">
                        <div class="col-lg-4 col-md-4">
                            <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1647eb43cb6%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1647eb43cb6%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" style="width:200;height: 150px;">
                        </div>
                        <div class="col-lg-8 col-md-8"> 
                                <h1>DLBD Inc.</h1>
                                <p>Hospital Only For High Class People.</p>
                                <p><i class="glyphicon glyphicon-map-marker">Address:</i> This is some text within a card body. This is some text within a card body. </p>
                                <p><i class="glyphicon glyphicon-map-marker">Mobile:</i>:985644566546  <i class="glyphicon glyphicon-map-marker">Mobile:</i>:985644566546   <i class="glyphicon glyphicon-map-marker">Mobile:</i>:985644566546</p>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               Edit User
                               <a class="btn btn-default  btn-sm pull-right" href="{{ route('users.index') }}">All User</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">

        <div class="col-lg-8 col-lg-offset-2">
            <img class="img-responsive" src="{{ $user->photo->file }}" >
            <br>
        </div>
       
    <div class="col-lg-12">
    {!! Form::model($user, ['method' => 'PUT', 'action'=>['UsersController@update',$user->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile', 'Mobile') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
        </div>

        

       <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', $roles , null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Select Photo') !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('is_active', array('0'=>'Decative','1'=>'Active'), null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    @include('includes.form_errors')

    </div>

                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            <div class="well">All Right Reserved By Underline Lab @2018.</div>
        </div>
    </div>
</div>
@endsection
