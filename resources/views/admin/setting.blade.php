@extends('layout.app')
@section('my_title') Setting @stop
@section('content')
    <div class="card shadow">
        <div class="card-body">
           <h6> <i class="fas fa-cog"></i>Setting</h6>
            <hr>

            <div class="row">
                <div class="small col-sm-8">
                    <p>
                        <i class="fas fa-user-circle"></i> Username :{{Auth::User()->name}}
                    </p>
                    <p>
                        <i class="fas fa-envelope-square"></i> Email :{{Auth::User()->email}}
                    </p>
                    <p>
                        <i class="fas fa-user-edit"></i> Role :
                    </p>
                    <p>
                        <i class="fas fa-calendar"></i> Member since :{{Auth::User()->created_at->diffForHumans()}}
                    </p>
                </div>
                <div class="col-sm-4">
                    @include('message')
                    <form method="post" action="{{route('update.password')}}">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="form-control @if($errors->has('current_password')) is-invalid @endif">
                            @if($errors->has('current_password'))
                                <span class="invalid-feedback">{{$errors->first('current_password')}}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control @if($errors->has('new_password')) is-invalid @endif">
                            @if($errors->has('new_password'))
                                <span class="invalid-feedback">{{$errors->first('new_password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="retype_new_password">Retype new password</label>
                            <input type="password" id="retype_new_password" name="retype_new_password" class="form-control  @if($errors->has('retype_new_password')) is-invalid @endif">
                            @if($errors->has('retype_new_password'))
                                <span class="invalid-feedback ">{{$errors->first('retype_new_password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>

    </div>
    @stop
