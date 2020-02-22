@extends('layout.app')
@section('my_title') New Road @stop
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h6> <i class="fas fa-plus-circle"></i> New Road</h6>
            <hr>


            <div class="row">
                <div class="col-sm-6">
                    @include('message')
                    <form method="post" action="{{route('road.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="quarter">Select Quarter</label>
                            <select id="quarter" name="quarter" class="custom-select">

                               @foreach($qtrs as $q)
                                   <option value="{{$q->id}}">
                                       {{$q->quarter_name}}
                                   </option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="road_name">Road Name</label>
                            <input type="text" id="road_name" name="road_name" class="form-control @if($errors->has('road_name')) is-invalid  @endif">
                            @if($errors->has('road_name'))
                                <span>{{$errors->first('road_name')}}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" type="submit">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        </div>
    </div>
@endsection
