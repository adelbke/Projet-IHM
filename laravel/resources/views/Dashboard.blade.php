@extends('layouts.dashboard')

@section('content')

@push('title')
		Centre de Gestion
@endpush
<!-- Begin Page Content -->
<div class="container-fluid">

	<!--  afficher une notification si la lésion à bien été enregistré -->
	@if (session()->has('ajouter'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session()->get('ajouter')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  @endif

	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
		
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-download fa-sm text-white-50"></i> Ajouter une lesion</button>
		
       <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Ajouter Une lesion </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

            <div class="container">
                <br>
                <form action="{{url('dash')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-12">
                            <div class="form-group">
                              <label for="dx">Catégorie de lèsion</label>
                              <select class="form-control font-weight-bold" name="dx" id="dx">
                                <option value="akiec">Kératoses actiniques et carcinome intraépithélial</option>
                                <option value="bcc">carcinome basocellulaire</option>
                                <option value="bkl">lésions bénignes de type kératose</option>
                                <option value="df">dermatofibroma</option>
                                <option value="mel">mélanome</option>
                                <option value="nv">naevus mélanocytaires</option>
                                <option value="vasc">lésions vasculaires</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-12">
                            <div class="form-group">
                              <label for="dx_type">Moyen de Confirmation (Type de Suivi)</label>
                              <select class="form-control font-weight-bold" name="dx_type" id="dx_type">
                                <option value="histo">histopathologie</option>
                                <option value="follow-up">visite de suivi</option>
                                <option value="consensus"> consensus d'experts</option>
                                <option value="confocal">microscopie confocale</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-12">
                            <div class="form-group">
                                <label for="localization">Localisation</label>
                                <select class="form-control font-weight-bold" name="localization" id="localization">
                                    <option value="abdomen">abdomen</option>
                                    <option value="back">dos</option>
                                    <option value="chest">poitrine</option>
                                    <option value="ear">oreille</option>
                                    <option value="face">visage</option>
                                    <option value="foot">pied</option>
                                    <option value="genital">génitale</option>
                                    <option value="hand">main</option>
                                    <option value="lower extremity">membre inférieur</option>
                                    <option value="neck">cou</option>
                                    <option value="scalp">cuir chevelu</option>
                                    <option value="trunk">torse</option>
                                    <option value="upper extremity">membre supérieur</option>
                                    <option value="unknown">inconnue</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-12">
                            <label for="sex">Sexe: </label>
                            <div class="form-group px-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="male" name="sex" value="male">
                                    <label class="custom-control-label" for="male">Homme</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="female" name="sex" value="female">
                                    <label class="custom-control-label" for="female">Femme</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="other" name="sex" value="unknown">
                                    <label class="custom-control-label" for="other">Autre</label>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-12">
                            <div class="form-group">
                              <label for="age">Age</label>
                              <input type="number"
                                class="form-control" name="age" id="age" aria-describedby="helpAge" placeholder="Age du Patient" min=0 max=120>
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
                    <div class="row mb-4">
                        <div class="col-md-12 col-12 mx-auto offset-lg-3 col-lg-6">
                            <div class="form-group mx-auto">
                                <label for="collection">Collection</label>
                                <select class="custom-select font-weight-bold" onchange="loadCollectionName(event)" name="collection" id="collection">
                                    <option selected value="create">Créer une Nouvelle collection</option>
                                    @foreach ($collectionList as $item)
                                        <option value="{{$item->id}}">{{$item->name}}; Avec {{$item->lesions_count}} Lesions </option>
                                    @endforeach
                                </select>
                                @push('js')
                                    <script>
                                        var loadCollectionName = function (event) {
                                            var container = document.getElementById('collectionNameContainer');
                                            if(event.target.value == "create"){
                                                container.innerHTML='<label for="collectionName">Entrez le nom de la collection à Ajouter</label>';
                                                container.innerHTML += '<input type="text" class="form-control" name="collectionName" id="collectionName" aria-describedby="helpId" placeholder="Le nom de la collection à Ajouter">';
                                            }else{
                                                container.innerHTML= '';
                                            }
                                        };
                                    </script>
                                @endpush
                            </div>
                            <div id="collectionNameContainer" class="form-group mx-auto">
                                  <label for="collectionName">Entrez le nom de la collection à Ajouter</label>
                                  <input type="text" class="form-control" name="collectionName" id="collectionName" aria-describedby="helpId" placeholder="Le nom de la collection à Ajouter">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn mx-auto btn-light border-success">Ajouter</button>
                    </div>
                    <br>
                </form>
              </div>
           </div>
         </div>
       </div>
	</div>





	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								@if (auth()->user()->role == "SuperAdmin")
									Nombres d'images hébergées
								@else
									Mes Images Hébergées
								@endif
								</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$imageCount}} image{{$imageCount>1? "s":""}} </div>
						</div>
						<div class="col-auto">
							<i class="fas fa-images fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								@if (auth()->user()->role == "SuperAdmin")
									Nombre de bases d'images
								@else
									Mes bases d'images
								@endif

							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$collectionCount}} base{{$collectionCount>1 ?"s":""}} </div>
						</div>
						<div class="col-auto">
							<i class="fas fa-layer-group fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
									Ratio images par lesion
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
											@if ($lesionCount != 0)
											{{floor($imageCount / $lesionCount *100)/100}}%
											@else
												0%
											@endif
									</div>
								</div>
								<div class="col mr-2">
									{{-- <div class="progress progress-sm mr-2">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="col-auto">
								<i class="fas fa-percent fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->

		@if (auth()->user()->role == "SuperAdmin")
		<div class="col-xl col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
                          @if($userPendingCount>0)  <span class="badge badge-danger" style="float:right"> {{$userPendingCount}} </span> @endif
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="{{ url('list') }}">Nombre de Contributeurs</a></div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								{{$userCount}}
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x  "></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>

	<!-- Content Row -->

	<div class="row">

		@if (auth()->user()->role == "SuperAdmin")
			<!-- Global Pie Chart -->
			<div class="col-xl-6 col-lg-6">
				<genderpiechart-component title="Toutes les Lesions par sexe" :genderData="{{$genderData}}"></genderpiechart-component>
			</div>
		@endif

		<!-- Pie Chart -->
		<div class="col-xl-6 col-lg-6">
			<genderpiechart-component title="Toutes mes lésions par sexe" :genderData="{{$usergenderData}}"></genderpiechart-component>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md col-lg col">
			<dxbarchart-component :data="{{$lesionsDataCount}}" ></dxbarchart-component>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

@endsection
