@extends('layout.frontend')
@section('my_title') Quarter Road @stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
               <a href="{{route('/')}}" class="btn btn-link text-secondary"><i class="fas fa-backward"></i>Back</a>
            </div>
            <div class="col-8">
                <p>All roads on <strong>{{$qtr->quarter_name}}</strong> quarter.</p>
            </div>

        </div>
        <div class="row">
            @foreach($roads as $r)
                <div class="col-6 col-sm-4 col-md-3" style="padding:0;margin: 0">
                    <a href="{{route('frontend.driver',['road_id'=>$r->id])}}">
                        <div class="img-thumbnail bg-secondary">
                            <div class="text-center small text-white py-5">
                                {{$r->road_name}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{$roads->links()}}

    </div>


@stop

