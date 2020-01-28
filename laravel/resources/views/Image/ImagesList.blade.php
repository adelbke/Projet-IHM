@extends('layouts.dashboard')

@push('title')
    Liste des images
@endpush
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="container-fluid col-12 col-md-9 col-lg-11 bg-white py-2 rounded">
            <div class="row">
@foreach ($image as $i)
<div class=" col-lg-3 col-md-4 col-6 mb-2 p-2">
<div class="card" style="">
    <div class="card shadow m-1 h-100" style="">
        <img class="card-img-top p-1" src="{{$i->path}}" style="width:210px;height:180px;"alt="Card image cap">
        <div class="card-body d-flex flex-column p-2">
        {{-- <h5 class="card-title">{{config('app.lesion_category')[$lesion->dx]}}</h5> --}}
            <ul class="pl-0 mb-auto">
                <li>Date de création : {{$i->created_at}}</li>
            </ul>
            <form class=justify-content-end" method="POST" action="{{url('/Image',['Image'=>$i->id]) }}">
                @csrf
                @method('DELETE')
            <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer cette image ?')" class="btn hvr-bob hvr-underline-from-left d-flex text-danger delete">Supprimer</button>
            </form>

        </div>
    </div>
  </div>

</div>
@endforeach
</div>
<div class="row mt-3 justify-content-center">
    {{$image->links()}}
</div>
</div>

</div>

</div>


@endsection
