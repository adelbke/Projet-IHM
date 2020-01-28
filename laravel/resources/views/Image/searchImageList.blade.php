@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 mx-3">
            @foreach ($lesion as $index => $value)
                <h4 class="mr-2">
                    <span class="badge badge-pill border py-1 px-3 border-primary" style="background:white;">{{$value}}</span>
                </h4>
            @endforeach
            
        </div>
        <div class="row mt-3    ">
            @foreach ($list as $item)
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="card p-2 h-100">
                      <img class="card-img-top" src="{{$item->path}}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection