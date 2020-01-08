@extends('layouts.dashboard')

@section('content')

@push('title')
		Centre de Gestion
@endpush
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                <form action="{{url('photo')}} " method="POST" enctype="multipart/form-data">
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
                                class="form-control" name="age" id="age" aria-describedby="helpAge" placeholder="Age du Patient">
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


	<!-- Content Row -->
	{{-- <div class="row">

		<!-- Content Column -->
		<div class="col-lg-6 mb-4">

			<!-- Project Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Projects</h6>
				</div>
				<div class="card-body">
					<h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
					<div class="progress mb-4">
						<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
					<div class="progress mb-4">
						<div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
					<div class="progress mb-4">
						<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
					<div class="progress mb-4">
						<div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
					<div class="progress">
						<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>

			<!-- Color System -->
			<div class="row">
				<div class="col-lg-6 mb-4">
					<div class="card bg-primary text-white shadow">
						<div class="card-body">
							Primary
							<div class="text-white-50 small">#4e73df</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="card bg-success text-white shadow">
						<div class="card-body">
							Success
							<div class="text-white-50 small">#1cc88a</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="card bg-info text-white shadow">
						<div class="card-body">
							Info
							<div class="text-white-50 small">#36b9cc</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="card bg-warning text-white shadow">
						<div class="card-body">
							Warning
							<div class="text-white-50 small">#f6c23e</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="card bg-danger text-white shadow">
						<div class="card-body">
							Danger
							<div class="text-white-50 small">#e74a3b</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<div class="card bg-secondary text-white shadow">
						<div class="card-body">
							Secondary
							<div class="text-white-50 small">#858796</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-lg-6 mb-4">

			<!-- Illustrations -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
				</div>
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
					</div>
					<p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
					<a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
				</div>
			</div>

			<!-- Approach -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
				</div>
				<div class="card-body">
					<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
					<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
				</div>
			</div>

		</div>
	</div> --}}
</div>
<!-- /.container-fluid -->

@endsection
