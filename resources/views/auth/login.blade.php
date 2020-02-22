@extends('layout.frontend')
@section('my_title') Login  @stop
@section('content')

    <div class="container" >
        <div class="row">
            <div class="col-sm-4 offset-4">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center text-primary">My awesome app</h3>
                        <div class="text-center text-secondary">
                            Sign In user account
                        </div>
                        <form method="post" action="{{route('login')}}">
                            <div class="form-group mt-5">
                                <label for="name">User Name</label>
                                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                                @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first('name')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                                @if($errors->has('password'))<span class="invalid-feedback">{{$errors->first('password')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                            </div>
                            @csrf
                        </form>
                    </div>

                </div>
                <div class="mt-3">
                    Do not have an account?<a href="{{route('register')}}">Sing Up</a>
                </div>
            </div>
                <div class="col-sm-8 offset-8">

                </div>
        </div>

    </div>
@endsection


