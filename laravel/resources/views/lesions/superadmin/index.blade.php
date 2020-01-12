@extends('layouts.dashboard')

@section('content')
@push('title')
    Liste Des Lésions
@endpush



<div class="card-group"  >

    <div class="card text-white bg-secondary  mb-3 p-0" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Catégorie de lesion</h5>
          <p class="card-text ">
              <ul class="card-text list-group  text-secondary">
            <li class="list-group-item"> <strong>akiec </strong>: Kératoses actiniques et carcinome intraépithélial</li>
            <li class="list-group-item"><strong>bcc :</strong> carcinome basocellulaire</li>
            <li class="list-group-item"><strong>bkl :</strong>  lésions bénignes de type kératose</li>
            <li class="list-group-item"><strong>df :</strong> dermatofibroma</li>
            <li class="list-group-item"><strong>mel : </strong> mélanome</li>
            <li class="list-group-item"><strong>vasc : </strong> lésions vasculaires</li>
            <li class="list-group-item"><strong>nv : </strong> naevus mélanocytaires</li>
          </ul></p>
        </div>
      </div>
      <div class="card text-white bg-info  mb-3 p-0" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Moyen de Confirmation </h5>
          <ul class="card-text text-info">
            <li class="list-group-item"> <strong>histo </strong>: histopathologie </li>
            <li class="list-group-item"><strong>follow-up :</strong> visite de suivi </li>
            <li class="list-group-item"><strong>consensus :</strong>  consensus d'experts </li>
            <li class="list-group-item"><strong>confocal :</strong> microscopie confocale </li>
          </ul>
        </div>
      </div>
      <div class="card text-white bg-primary  mb-3 p-0" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Localisation</h5>
          <ul class="card-text text-primary" >
            <li class="list-group-item"> <strong>abdomen :</strong>abdomen</li>
            <li class="list-group-item"><strong>back :</strong> dos</li>
            <li class="list-group-item"><strong>chest :</strong>  poitrine</li>
            <li class="list-group-item"><strong>ear :</strong> oreille</li>
            <li class="list-group-item"><strong>face : </strong> visage</li>
            <li class="list-group-item"><strong>foot : </strong>  pied</li>
            <li class="list-group-item"><strong>genital : </strong> génitale </li>

            <li class="list-group-item"> <strong>hand </strong>: main</li>
            <li class="list-group-item"><strong>lower extremity :</strong>  membre inférieur</li>
            <li class="list-group-item"><strong>neck :</strong>  cou</li>
            <li class="list-group-item"><strong>scalp :</strong> cuir chevelu</li>
            <li class="list-group-item"><strong>trunk : </strong> torse</li>
            <li class="list-group-item"><strong>upper extremity : </strong>  membre supérieur</li>
            <li class="list-group-item"><strong>unknown : </strong>  inconnue</li>
          </ul>
        </div>
      </div>
    </div>








@foreach ($Collection as $X)


<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$X->id}}" aria-expanded="true" aria-controls="collapseOne">
         Collection : {{$X->name}}
          </button>
        </h5>
      </div>

      <div id="collapse{{$X->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

        @foreach ($Lesion as $item)
            @if($item->collection_id === $X->id)
        <div class="card-body">


            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h3>Lesion</h3>
                         </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Catégorie de lèsion : {{$item->dx}} </li>
                        <li class="list-group-item"> Moyen de Confirmation : {{$item->dx_type}}</li>
                        <li class="list-group-item">Localisation : {{$item->localization}}</li>
                        <li class="list-group-item">sexe : {{$item->sex}}</li>
                        <li class="list-group-item">age : {{$item->age}}</li>

                       </ul>

                  </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#col{{$item->id}}" onclick="func()"> Modifier une lesion</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="col{{$item->id}}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle"> Modifier Une lesion </h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>

                       <div class="container">
                           <br>
                           <form action="#" method="POST" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" name="_method" value="put" >
                               <div class="row">
                                   <div class="col-md-6 col-lg-6 col-12">
                                       <div class="form-group">
                                         <label for="dx">Catégorie de lèsion</label>
                                       <select class="form-control font-weight-bold" name="dx" id="dx" value="df" >
                                       @if($item->dx === 'akiec')    <option value="akiec" selected >Kératoses actiniques et carcinome intraépithélial</option>
                                       @else                 <option value="akiec" >Kératoses actiniques et carcinome intraépithélial</option> @endif
                                       @if($item->dx === 'bcc')   <option value="bcc"selected  >carcinome basocellulaire</option>
                                       @else                 <option value="bcc" >carcinome basocellulaire</option>@endif
                                       @if($item->dx === 'bkl')   <option value="bkl" selected >lésions bénignes de type kératose</option>
                                       @else                 <option value="bkl" >lésions bénignes de type kératose</option>@endif
                                       @if($item->dx === 'df')   <option value="df" selected >dermatofibroma</option>
                                       @else                 <option value="df" >dermatofibroma</option>@endif
                                       @if($item->dx === 'mel')   <option value="mel" selected >mélanome</option>
                                       @else                 <option value="mel" >mélanome</option>@endif
                                       @if($item->dx === 'nv')   <option value="nv" selected >naevus mélanocytaires</option>
                                       @else                 <option value="nv" >naevus mélanocytaires</option>@endif
                                       @if($item->dx === 'vasc')   <option value="vasc" selected >lésions vasculaires</option>
                                       @else                 <option value="vasc" >lésions vasculaires</option> @endif
                                         </select>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-12">
                                       <div class="form-group">
                                         <label for="dx_type">Moyen de Confirmation (Type de Suivi)</label>
                                         <select class="form-control font-weight-bold" name="dx_type" id="dx_type">
                                          @if($item->dx_type === 'histo') <option value="histo" selected >histopathologie</option>
                                          @else    <option value="histo"  >histopathologie</option>     @endif
                                          @if($item->dx_type === 'follow-up')<option value="follow-up" selected >visite de suivi</option>
                                          @else     <option value="follow-up"  >visite de suivi</option>    @endif
                                          @if($item->dx_type === 'consensus') <option value="consensus" selected > consensus d'experts</option>
                                          @else      <option value="consensus"  > consensus d'experts</option>   @endif
                                          @if($item->dx_type === 'confocal') <option value="confocal" selected >microscopie confocale</option>
                                          @else     <option value="confocal"  >microscopie confocale</option>    @endif
                                         </select>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-6 col-lg-6 col-12">
                                       <div class="form-group">
                                           <label for="localization">Localisation</label>
                                           <select class="form-control font-weight-bold" name="localization" id="localization" value="{{$item->localization}}">

         @if($item->localization === 'abdomen')<option value="abdomen" selected>abdomen</option>
@else   <option value="abdomen">abdomen</option>  @endif
         @if($item->localization === 'back')   <option value="back" selected>dos</option>
@else  <option value="back">dos</option>   @endif
         @if($item->localization === 'chest')   <option value="chest" selected>poitrine</option>
@else   <option value="chest">poitrine</option>  @endif
         @if($item->localization === 'ear')  <option value="ear" selected>oreille</option>
@else   <option value="ear">oreille</option>  @endif
         @if($item->localization === 'face')  <option value="face" selected>visage</option>
@else   <option value="face">visage</option>  @endif
         @if($item->localization === 'foot')  <option value="foot" selected>pied</option>
@else   <option value="foot">pied</option>  @endif
         @if($item->localization === 'genital')  <option value="genital" selected>génitale</option>
@else   <option value="genital">génitale</option>  @endif
         @if($item->localization === 'hand')  <option value="hand"selected>main</option>
@else   <option value="hand">main</option>  @endif
         @if($item->localization === 'lower extremity') <option value="lower extremity"selected>membre inférieur</option>
@else   <option value="lower extremity">membre inférieur</option>  @endif
         @if($item->localization === 'neck') <option value="neck"selected>cou</option>
@else   <option value="neck">cou</option>  @endif
         @if($item->localization === 'scalp') <option value="scalp"selected>cuir chevelu</option>
@else   <option value="scalp">cuir chevelu</option>  @endif
         @if($item->localization === 'trunk') <option value="trunk"selected>torse</option>
@else   <option value="trunk">torse</option>  @endif
         @if($item->localization === 'upper extremity') <option value="upper extremity" selected>membre supérieur</option>
@else    <option value="upper extremity">membre supérieur</option>  @endif
         @if($item->localization === 'unknown') <option value="unknown" selected>inconnue</option>
@else   <option value="unknown">inconnue</option>  @endif
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-12">
                                    <label for="sex">Sexe: </label>
                                    <div class="form-group px-4">
                                        <div class="custom-control custom-radio custom-control-inline">
                                          @if($item->sex === 'male')  <input type="radio" class="custom-control-input" id="male{{$item->id}}" name="sex" value="male" checked>
                                          @else <input type="radio" class="custom-control-input" id="male{{$item->id}}" name="sex" value="male"> @endif
                                            <label class="custom-control-label" for="male{{$item->id}}">Homme</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                            @if($item->sex === 'female') <input type="radio" class="custom-control-input" id="female{{$item->id}}" name="sex" value="female" checked>
                                            @else <input type="radio" class="custom-control-input" id="female{{$item->id}}" name="sex" value="female"> @endif
                                            <label class="custom-control-label" for="female{{$item->id}}">Femme</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                            @if($item->sex === 'unknown')<input type="radio" class="custom-control-input" id="other{{$item->id}}" name="sex" value="unknown" checked >
                                            @else <input type="radio" class="custom-control-input" id="other{{$item->id}}" name="sex" value="unknown" > @endif
                                            <label class="custom-control-label" for="other{{$item->id}}">Autre</label>
                                          </div>
                                    </div>
                                </div>
                            </div>
                               <div class="row">
                                   <div class="col-md-6 col-lg-6 col-12">
                                       <div class="form-group">
                                         <label for="age">Age</label>
                                         <input type="number"
                                       class="form-control" name="age" id="age" aria-describedby="helpAge" placeholder="Age du Patient" min=0 max=120 value="{{$item->age}}">
                                         <small id="helpAge" class="form-text text-muted">Veuillez entrer l'age du patient</small>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-12">
                                       <label for="age">Images</label>
                                       <div class="custom-file">
                                           <input type="file" class="custom-file-input" id="validatedCustomFile" @error('image') is-invalid @enderror name="image[]" id="image"  value="{{ old('image') }}" onchange="loadfile(event)" multiple>
                                           <label class="custom-file-label" for="validatedCustomFile">Choisir une image (lésion)</label>
                                         </div>
                                         <div id="imagePreview" class="row mt-3">
                                         </div>
                                         @push('js')
                                           <script>
                                             var loadfile = function(event) {
                                               // var image = document.getElementById('output');
                                               // image.src = URL.createObjectURL(event.target.files[0]);
                                               var preview = document.getElementById('imagePreview');
                                               preview.innerHTML ="";
                                               for (let i = 0; i < event.target.files.length; i++) {
                                                 const element = event.target.files[i];
                                                 preview.innerHTML = preview.innerHTML + '<img src="'+ URL.createObjectURL(element)+'" alt="" class="img-fluid mx-2 rounded p-2 border border-primary my-2 col-3 col-md-3" style="width:100px">';

                                               }

                                             };
                                           </script>
                                         @endpush

                                   </div>
                               </div>
                               <div class="row">
                                   <button type="submit" class="btn mx-auto btn-light border-success"> Modifier </button>


                               </div>
                               <br>
                           </form>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                    <div class="card-header">
                       <h3>Image(s)</h3>
                         </div>
                  <div class="card-body">
                    <div class="card">
                  @foreach ( $Image as $Y)


                   @if($item->id === $Y->lesion_id )
                    <img src="{{ $Y->path}}" class="img-fluid mx-2 rounded p-2 border border-primary my-2 col-3 col-md-3" style="width:100px">

                @endif
                @endforeach
                    </div>
                  </div>
                </div>
              </div>




            </div>

            @endif
          @endforeach
       </div>
    </div>
    @endforeach



@endsection
