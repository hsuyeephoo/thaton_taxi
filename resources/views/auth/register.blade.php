@extends('layout.frontend')
@section('my_title') Register @stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-4">
                @if(Session('info'))
                <div class="alert alert-success">
                 {{Session('info')}}
                </div>
                @endif
              <div class="card shadow">
                  <div class="card-body">
                      <h3 class="text-center text-primary">Welcome new user for sign up.</h3>
                      <div class="text-center text-secondary">Sign up new user account.</div>
                   <form method="post" action="{{route('register')}}">
                       <div class="form-group mt-5">
                           <label for="name">User Name</label>
                           <input type="text" id="name" name="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                           @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first('name')}}</span> @endif
                       </div>
                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif">
                           @if($errors->has('email'))<span class="invalid-feedback">{{$errors->first('email')}}</span> @endif
                       </div>
                       <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" id="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                           @if($errors->has('password'))<span class="invalid-feedback">{{$errors->first('password')}}</span> @endif
                       </div>
                       <div class="form-group">
                           <label for="confirm_password">Confirm Password</label>
                           <input type="password" id="confirm_password" name="confirm_password" class="form-control @if($errors->has('confirm_password'))
                            is-invalid   @endif">
                           @if($errors->has('confirm_password'))<span class="invalid-feedback">{{$errors->first('confirm_password')}}</span> @endif
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                       </div>
                       @csrf
                   </form>

                  </div>
              </div>
                <div class="mt-3">
                    Already sign up? <a href="{{route('login')}}">Sign In</a>
                </div>
            </div>
            <div class="col-sm-8 offset-8">

            </div>

        </div>

    </div>

@stop


