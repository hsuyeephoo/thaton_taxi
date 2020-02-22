
@extends('layout.app')
@section('my_title') All Motors @stop
@section('content')
    @include('message')

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6> <i class="fas fa-map"></i> All Motors</h6>
                </div>
                <div class="col-sm-9">
                    <form class="row" method="get" action="{{route('search.driver')}}">
                        <div class="form-group col-sm-3">
                            <select class="custom-select" name="quarter_id" required>
                               <option value="" >
                                   Select Quarter
                               </option>
                                @foreach($qtrs as $q)
                                <option value="{{$q->id}}" >
                                    {{$q->quarter_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <select class="custom-select" name="road_id" required>
                                <option value="" >
                                    Select Road
                                </option>
                                @foreach($roads as $r)
                                    <option value="{{$r->id}}" >
                                        {{$r->road_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="search" name="driver_name" required placeholder="search driver" class="form-control">
                        </div>
                        <div class="form-group col-sm-2">
                            <button type="submit" class="btn btn-secondary"><i class="fas fa-search-location"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-borderless table-hover">
                        @foreach($motors as $m)
                            <tr class="shadow">
                                <td>
                                    <div class="small text-secondary ">
                                        Quarters Name
                                    </div>
                                    <div class="small">
                                        {{$m->quarter->quarter_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary ">
                                       Roads Name
                                    </div>
                                    <div class="small">
                                        {{$m->road->road_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary ">
                                        Driver Name
                                    </div>
                                    <div class="small">
                                        {{$m->driver_name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-secondary">
                                        Actions
                                    </div>
                                    <div>
                                        <a data-toggle="modal" data-target="#s{{$m->id}}" href="#"><i class="fas fa-eye"></i></a>
                                        <a data-toggle="modal" data-target="#d{{$m->id}}" class="text-danger" href="#"><i class="fas fa-times-circle"></i></a>
                                        <a href="{{route('edit.motor',['id'=>$m->id])}}"><i class="fas fa-edit"></i></a>

                                    </div>
                                    {{--show modal--}}
                                    <div id="s{{$m->id}}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Driver details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="m-4">
                                                        <img class="img-thumbnail" src="{{route('driver.photo',['p_name'=>$m->photo])}}">
                                                    </div>
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><i class="fas fa-user"></i>Driver Name:{{$m->driver_name}}</li>
                                                        <li class="list-group-item"><i class="fas fa-phone-alt"></i>Phone:{{$m->phone}}</li>
                                                        <li class="list-group-item"><i class="fas fa-map"></i>Road Name:{{$m->road->road_name}}</li>
                                                        <li class="list-group-item"><i class="fas fa-map-pin"></i>Quarter Name:{{$m->quarter->quarter_name}}</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{--show modal end--}}

                                    {{-- drop model start--}}
                                    <div id="d{{$m->id}}" class="modal fade " tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body text-center text-danger">
                                                        <i class="fas fa-exclamation-circle fa-4x"></i>
                                                        <p>The selected text will drop from database.</p>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <a href="{{route('drop.motor',['id'=>$m->id])}}">Agree</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- drop model end--}}

                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$motors->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection
