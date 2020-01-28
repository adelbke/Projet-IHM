@extends('layouts.dashboard')

@push('title')
    Liste Des Lésions
@endpush


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid col-12 col-md-9 col-lg-11 bg-white py-2 rounded">
            <div class="row">
                @foreach ($Lesion as $X)
                    <div class=" col-lg-3 col-md-4 col-6 mb-2 p-2">
                        <div class="card shadow m-1 h-100" style="">
                            <img class="card-img-top mx-auto p-1" src="{{$X->images[0]->path}}" style="max-height:180px;"alt="Card image cap">
                            <div class="card-body d-flex flex-column p-2">
                            {{-- <h5 class="card-title">{{config('app.lesion_category')[$lesion->dx]}}</h5> --}}
                                <ul class="pl-0 mb-auto">
                                    <li>-Type: {{config('global.lesion_dx')[$X->dx]}}</li>
                                    <li>-Confirmation: {{config('global.lesion_dx_type')[$X->dx_type]}} </li>
                                    <li>-Localisation: {{config('global.lesion_localization')[$X->localization]}} </li>
                                    <li>-sexe: {{config('global.lesion_sex')[$X->sex]}}</li>
                                    <li>-Age: {{$X->age}}</li>
                                </ul>
                            <a href="{{url('/Image',['Image'=>$X->id])}}" class="btn btn-link hvr-fade d-flex align-self-end">Voir Images</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-3 justify-content-center">
                {{$Lesion->links()}}
            </div>
        </div>

    </div>

</div>
@endsection
