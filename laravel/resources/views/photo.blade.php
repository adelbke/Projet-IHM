@extends('layouts.dashboard')

@section('content')
@push('title')
Ajouter une lésion
@endpush


<div class="container">
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
						<input type="radio" class="custom-control-input" id="other" name="sex" value="other">
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
					<select class="custom-select font-weight-bold" name="collection" id="collection">
						<option selected value="create">Créer une Nouvelle collection</option>
						@foreach ($collectionList as $item)
							<option value="{{$item->id}}">{{$item->name}}; Avec {{$item->lesions_count}} Lesions </option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn mx-auto btn-light border-success">Ajouter</button>
		</div>
	</form>
</div>



{{-- <br><br>
<br><br>
<div class="container">
  <div class="row">
    <form class="col-md-12" action="{{ url('photo') }}" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Options</label>
        </div>
        <select name="dx" class="custom-select" id="inputGroupSelect01" >
          <option value="akiec">Kératoses actiniques et carcinome intraépithélial</option>
          <option value="bcc">carcinome basocellulaire</option>
          <option value="bkl">lésions bénignes de type kératose</option>
          <option value="df">dermatofibroma</option>
          <option value="mel">mélanome</option>
          <option value="nv">naevus mélanocytaires</option>
          <option value="vasc">lésions vasculaires</option>
       </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type de suivi</label>
        </div>
     <select name="dx_type" class="custom-select" id="inputGroupSelect01">
        <option value="histo">histopathologie</option>
        <option value="follow-up">visite de suivi</option>
        <option value="consensus"> consensus d'experts</option>
        <option value="confocal">microscopie confocale</option>
    </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Localisation</label>
      </div>
  <select name="localization" class="custom-select" id="inputGroupSelect01" >
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

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Sexe</label>
    </div>
<select name="sex" class="custom-select" id="inputGroupSelect01">
    <option value="male">Homme</option>
    <option value="female">Femme</option>
    <option value="Other">Inconnu</option>
</select>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend" for="example-number-input">
  <label for="example-number-input" class="input-group-text">Age</label>
  </div>
    <input class="form-control" type="number" min="0" name="age" id="example-number-input" >
  </div>



<div class="custom-file">
  <input type="file" class="custom-file-input" id="validatedCustomFile" @error('image') is-invalid @enderror name="image[]" id="image"  value="{{ old('image') }}" onchange="loadfile(event)" multiple>
  <label class="custom-file-label" for="validatedCustomFile">Choisir une image ...</label>
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
        preview.innerHTML = preview.innerHTML + '<img src="'+ URL.createObjectURL(element)+'" alt="" class="img-fluid my-1 mx-2 rounded p-2 border border-primary col-4 col-md-4" style="width:100px">';
        
      }

    };
  </script>
@endpush


<br><br>

<div class="form-group  text-center">
  <button type="submit" class="btn btn-primary">envoyer</button>
</div>
    </form>
  </div>
</div> --}}
@endsection