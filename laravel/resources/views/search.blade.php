@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="container bg-gray mt-3">
                    <h4>Filtres</h4>
                    <searchfilters-component csrf="{{csrf_token()}}"></searchfilters-component>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9 bg-white py-2 rounded">
                <div class="row">
                    @foreach ($results as $lesion)
                        <div class=" col-lg-3 col-md-4 col-6 mb-2 p-2">
                            <div class="card shadow m-1 h-100" style="">
                                <img class="card-img-top p-1" style="max-height: 180px;" src="{{$lesion['images'][0]['path']}}" alt="Card image cap">
                                <div class="card-body d-flex flex-column p-2">
                                {{-- <h5 class="card-title">{{config('app.lesion_category')[$lesion->dx]}}</h5> --}}
                                    <ul class="pl-0 mb-auto">
                                        <li>-Type: {{config('global.lesion_dx')[$lesion->dx]}}</li>
                                        <li>-Confirmation: {{config('global.lesion_dx_type')[$lesion->dx_type]}} </li>
                                        <li>-Localisation: {{config('global.lesion_localization')[$lesion->localization]}} </li>
                                        <li>-sexe: {{config('global.lesion_sex')[$lesion->sex]}}</li>
                                        <li>-Age: {{$lesion->age}}</li>
                                    </ul>
                                <a href="/images/{{$lesion->id}}" class="btn btn-link hvr-fade d-flex align-self-end">Voir Images</a>
                                </div>
                            </div>
                        </div>                
                    @endforeach
                </div>
                <div class="row mt-3 justify-content-center">
                    {{$results->links()}}
                </div>
            </div>
            
        </div>

    </div>
@endsection