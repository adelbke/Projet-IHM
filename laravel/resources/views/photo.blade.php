<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon site</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <br>

            <h1 align="center">Envoi d'une photo</h1>

                <form action="{{ url('photo') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Type de lesion</label>
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
                    <input type="number" value="age" name="age"> <br>

                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                          <button class="input-group-text" id="inputGroupFileAddon01">Envoyer</button>
                        </div>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"  @error('image') is-invalid @enderror" name="image[]" id="image"  value="{{ old('image') }}" multiple>
                        @error('image')
                            <div>{{ $message }}</div>
                        @enderror

                        <label class="custom-file-label" for="inputGroupFile01">{{old('image')}}</label>
                          </div>
                        </div>




                    </div>
                </form>

    </body>
</html>
