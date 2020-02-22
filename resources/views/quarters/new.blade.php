@extends('layout.app')
@section('my_title') New Quarter @stop
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h6> <i class="fas fa-plus-circle"></i> New Quarters</h6>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    @include('message')
                    <form method="post" action="{{route('quarter.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="quarter_name">Quarter Name</label>
                            <input type="text" id="quarter_name" name="quarter_name" class="form-control @if($errors->has('quarter_name')) is-invalid @endif">
                            @if($errors->has('quarter_name'))
                                <span class="invalid-feedback"> {{$errors->first('quarter_name')}} </span>
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
@endsection
