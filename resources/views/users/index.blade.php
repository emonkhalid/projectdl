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

                    <div class="row">
                        <div class="col-lg-12 ">
                            <table class="table table-striped table-responsive">
                                  <thead>
                                  <tr class="danger">
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <!-- <th>Email</th> -->
                                      <th>Role</th>
                                      <th>Created</th>
                                      <th>Status</th>
                                      <th>Actions</th>                                          
                                  </tr>
                              </thead>   
                              <tbody>
                            @if($users)
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img class="img-responsive" width="100" height="80" src="images/{{ $user->photo->file }}"></td>
                                    <td>{{ $user->name }}</td>
                                   <!--  <td>{{ $user->email }}</td> -->
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                
                                    @if($user->is_active == 1)
                                    <td>
                                        <span class="label label-success">Active</span>
                                    </td>
                                    @endif
                                    @if($user->is_active == 0)
                                        <td>
                                        <span class="label label-warning">Not Active</span>
                                    </td>
                                    @endif
                                    <td>
                                        <a class ="btn btn-danger btn-xs" href="">Delete</a> | 
                                        <a class ="btn btn-primary btn-xs" href="">Edit</a> | 
                                        <a class ="btn btn-success btn-xs" href="{{ route('users.show',$user->id)}}">View</a>
                                    </td>
                                                                       
                                </tr>
                                @endforeach
                            @endif                                     
                              </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 text-center">
                            <a class="btn btn-primary  btn-md" href="{{ route('users.create') }}">Create User</a>
                        </div>
                        <div class="col-lg-12 text-center">
                            {{ $users->render() }}
                        </div>
                    </div>                                   
                </div>
            </div>
       
 


               
            
            <div class="well">All Right Reserved By Underline Lab @2018.</div>
        
    </div>
</div>
@endsection
