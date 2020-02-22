@extends('layout.app')
@section('my_title') Dashboard @stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 bg-primary p-3">
            <h5>Add Quarter <i class="float-right fas fa-plus-circle"></i></h5>
            <hr>
            <a class="btn btn-block" href="{{route('quarter.new')}}">More</a>
        </div>
        <div class="col-sm-8 bg-info p-3">
            <h5>Quarters {{count($qtrs)}} <i class="float-right fas fa-city"></i></h5>
            <hr>
            <a class="btn btn-block" href="{{route('quarter.all')}}">More</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 bg-danger p-3">
            <h5>Add Road <i class="float-right fas fa-plus-circle"></i></h5>
            <hr>
            <a class="btn btn-block" href="{{route('road.new')}}">More</a>
        </div>
        <div class="col-sm-7 bg-primary p-3">
            <h5>Roads {{count($roads)}} <i class="float-right fas fa-road"></i></h5>
            <hr>
            <a class="btn btn-block" href="{{route('road.all')}}">More</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 bg-secondary p-3">
            <h5>Add Drivers <i class="float-right fas fa-plus-circle"></i></h5>
            <hr>
            <a class="btn btn-block" href="{{route('motor.new')}}">More</a>
        </div>
        <div class="col-sm-6 bg-success p-3">
            <h5> Drivers {{count($drivers)}} <i class="float-right fas fa-user-alt"></i></h5>
            <hr>
            <a class="btn btn-block" href="{{route('motor.all')}}">More</a>
        </div>
    </div>
</div>
    @endsection
