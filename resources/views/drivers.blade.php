@extends('layout.frontend')
@section('my_title') Road Drivers @stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <a href="{{route('/')}}" class="btn btn-link text-secondary"><i class="fas fa-backward"></i>Back</a>
            </div>
            <div class="col-8">
                <p>All drivers on <strong>{{$road->road_name}}</strong> streets on <strong>{{$qtr->quarter_name}}</strong> quarter.</p>
            </div>

        </div>
        <div class="row">
            @foreach($drivers as $d)
                <div class="col-6 col-sm-4 col-md-3" style="padding:0;margin: 0">
                        <div class="img-thumbnail">
                            <div class="media">
                                <img style="width: 100px ; height: 100px" src="{{route('driver.image',['img_name'=>$d->photo])}}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <div class="mt-0">Name: {{$d->driver_name}}</div>
                                    <div><i class="fas fa-phone-alt"></i>{{$d->phone}}</div>
                                    <div><a href="tel:{{$d->phone}}" > Call Now</a></div>
                               </div>

                             </div>
                        </div>
                 </div>
                    @endforeach
                </div>
        {{$drivers->links()}}

    </div>


@stop

