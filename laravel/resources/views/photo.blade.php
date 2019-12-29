<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ASIC</title>
        <link rel="stylesheet" href="css/app.css" crossorigin="anonymous">

    </head>
    <body>
      <br><br>
        <h1 class="text-center">Ajouter une image</h1>
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
            <input class="form-control" type="number" min="0" value="age" id="example-number-input" >
          </div>

      

        <div class="custom-file">
          <input type="file" class="custom-file-input" id="validatedCustomFile" @error('image') is-invalid @enderror name="image[]" id="image"  value="{{ old('image') }}" multiple>
          <label class="custom-file-label" for="validatedCustomFile">Choisir une image ...</label>
        </div><br><br>

        <div class="form-group  text-center">
          <button type="submit" class="btn btn-primary">envoyer</button>
        </div>
            </form>
          </div>
        </div>
    </body>
</html>
