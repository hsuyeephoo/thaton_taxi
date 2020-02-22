@extends('layout.frontend')
@section('my_title') Welcome  @stop
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="get" action="{{route('frontend.search.quarter')}}">
                        <div>
                             <input type="search" name="search_quarter" class="form-control-plaintext" required placeholder="search quarter">
                        </div>
                    </form>

                </div>

            </div>
          <div class="row">
              @foreach($qtrs as $q)
              <div class="col-6 col-sm-4 col-md-3" style="padding:0;margin: 0">
                  <a href="{{route('frontend.road',['quarter_id'=>$q->id])}}">
                      <div class="img-thumbnail bg-secondary">
                          <div class="text-center small text-white py-5">
                              {{$q->quarter_name}}
                          </div>
                      </div>
                  </a>
              </div>
                  @endforeach
          </div>
            {{$qtrs->links()}}

        </div>


    @stop

