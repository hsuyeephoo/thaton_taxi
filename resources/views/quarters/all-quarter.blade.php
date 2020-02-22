
@extends('layout.app')
@section('my_title') All Quarter @stop
@section('content')
    @include('message')

    <div class="card shadow">
        <div class="card-body">
            <h6> <i class="fas fa-map"></i> All Quarters</h6>
            <hr>
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-borderless table-hover">
                        @foreach($qtrs as $q)
                        <tr class="shadow">
                            <td>
                                <div class="small text-secondary ">
                                    Quarters
                                </div>
                                <div class="small">
                                    {{$q->quarter_name}}
                                </div>
                            </td>
                            <td>
                                <div class="small text-secondary">
                                    Actions
                                </div>
                                <div>
                                    <a data-toggle="modal" data-target="#d{{$q->id}}" class="text-danger" href="#"><i class="fas fa-times-circle"></i></a>
                                    <a data-toggle="modal" data-target="#e{{$q->id}}" href="#"><i class="fas fa-edit"></i></a>

                                </div>

                                <div  id="e{{$q->id}}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="{{route('edit')}}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Quarters</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$q->id}}">

                                                    <div class="form-group">
                                                        <label for="quarter_name">Quarter Name</label>
                                                        <input type="text" name="quarter_name" id="quarter_name" value="{{$q->quarter_name}}" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                                    <div id="d{{$q->id}}" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirm</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center text-danger">
                                                        <p>The selected text will drop from database.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('delete',['id'=>$q->id])}}">Agree</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$qtrs->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection
