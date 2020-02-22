@extends('layout.app')
@section('my_title') Edit Motor @stop
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h6> <i class="fas fa-plus-circle"></i> Edit Motor</h6>
            <hr>


            <div class="row">
                <div class="col-sm-6">
                    @include('message')
                    <form enctype="multipart/form-data" method="post"  action="{{route('update.motor')}}" >
                        <input type="hidden" name="id" value="{{$motor->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input accept="image/*" type="file" id="photo" name="photo" class="form-control-file @if($errors->has('photo')) is-invalid  @endif">
                            @if($errors->has('photo'))
                                <span>{{$errors->first('photo')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="driver_name"> Driver Name</label>
                            <input value="{{$motor->driver_name}}" type="text" id="driver_name" name="driver_name" class="form-control @if($errors->has('driver_name')) is-invalid  @endif">
                            @if($errors->has('driver_name'))
                                <span>{{$errors->first('driver_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone"> Phone Number</label>
                            <input value="{{$motor->phone}}" type="tel" id="phone" name="phone" class="form-control @if($errors->has('phone')) is-invalid  @endif">
                            @if($errors->has('phone'))
                                <span>{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="road">Select Road</label>
                            @if($errors->has('road'))
                                <span>{{$errors->first('road')}}</span>
                            @endif
                            <select id="road" name="road" class="custom-select @if($errors->has('road')) is-invalid  @endif">

                                <option value=""> Select Road</option>
                                @foreach($roads as $r)
                                    <option @if($r->id == $motor->road_id) selected @endif  value="{{$r->id}}">
                                        {{$r->road_name}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="quarter">Select Quarter</label>
                            <input value="{{$motor->quarter_id}}" list="quarter_list" type="text" name="quarter" id="quarter" class="form-control @if($errors->has('quarter')) is-invalid  @endif ">
                            @if($errors->has('quarter'))
                                <span>{{$errors->first('quarter')}}</span>
                            @endif
                            {{--html datalist --}}
                            <datalist id="quarter_list">
                                @foreach($qtrs as $q)
                                    <option value="{{$q->id}}">{{$q->quarter_name}}</option>
                                @endforeach
                            </datalist>
                            {{--
                            <select id="quarter" name="quarter" class="custom-select">
                                <option value=""> Select Quarter</option>
                                @foreach($qtrs as $q)
                                   <option value="{{$q->id}}">
                                       {{$q->quarter_name}}
                                   </option>
                                  @endforeach
                            </select>
                             --}}
                        </div>

                        <div class="form-group">
                            <a href="{{route('motor.all')}}" class="btn">Close</a>
                            <button class="btn btn-primary btn-lg" type="submit">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

