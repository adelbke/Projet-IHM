<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>IHM</title>
    
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div id="app">
        @auth
        <navbar-component first-name="{{auth()->user()->Firstname}}"
            last-name="{{auth()->user()->Lastname}}" 
            csrf="{{ csrf_token() }}"></navbar-component>
            @endauth
            @guest
            <navbar-component></navbar-component>
            @endguest
            <div style="background:linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ),url('https://freerangestock.com/sample/120965/overhead-view-of-a-laptop-and-a-stethoscope--medical-work.jpg');width:100%; background-size:cover; " 
            class="container-fluid pt-5 pb-4">
            
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h1 class="h1 text-center text-white text-shadow"> ASIC </h1>
                        <h4 class="h4 text-center text-white">The Algerian Skin Imaging Collaboration</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <filter-component csrf="{{csrf_token()}}"></filter-component>
                    </div>
                </div>
                {{-- <div class="filter-bar row mt-5">
                    <div class="col-md-8 mt-4 offset-md-2">
                        <form action="" method="get">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- test -->
                                    
                                    
                                    <select name="dx" id="dx" class="custom-select d-flex mx-2">
                                        <option selected style="color:#bfbfbf;font-style:italic;font-weight:bold">lesion</option>
                                        <option value="akiec">Kératoses actiniques et carcinome intra-épithélial</option>
                                        <option value="bcc"> carcinome basocellulaire</option>
                                        <option value="bkl">lésions bénignes de type kératose</option>
                                        <option value="df"> dermatofibroma </option>
                                        <option value="mel">mélanome </option>
                                        <option value="nv">naevus mélanocytaires </option>
                                        <option value="vasc">lésions vasculaires</option>
                                    </select> 
                                    
                                    
                                    <select name="dx_type" id="dx_type" class="custom-select mx-2">
                                        <option selected style="color:#bfbfbf;font-style:italic;font-weight:bold">type de confirmation</option>
                                        <option value="histo">histopathologie</option>
                                        <option value="follow-up">examen de suivi</option>
                                        <option value="consensus">consensus des spécialistes</option>
                                        <option value="confocal">microscopie confocale in-vivo</option>
                                    </select>
                                    
                                    <select name="sex" id="sex" class="custom-select mx-2">
                                        <option selected style="color:#bfbfbf;font-style:italic;font-weight:bold">sexe</option>
                                        <option value="male">homme</option>
                                        <option value="female">femme</option>
                                        <option value="unknown">inconnu</option>
                                    </select>
                                    
                                    <select name="age" id="age" class="custom-select mx-2">
                                        <option selected style="color:#bfbfbf;font-style:italic;font-weight:bold">age</option>
                                        @for($i=0;$i<=110;$i++) 
                                        <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    
                                    <select name="dx" id="dx" class="custom-select d-flex mx-2">
                                        <option selected style="color:#bfbfbf;font-style:italic;font-weight:bold">localisation</option>
                                        <option value="abdomen">abdomen</option>
                                        <option value="back">dos </option>
                                        <option value="chest">poitrine</option>
                                        <option value="ear">oreille</option>
                                        <option value="face">visage</option>
                                        <option value="foot">pied</option>
                                        <option value="genital">génital</option>
                                        <option value="hand">main</option>
                                        <option value="lower_extremity ">extrémité inférieure </option>
                                        <option value="neck">cou</option>
                                        <option value="scalp">cuir chevelu</option>
                                        <option value="trunk">Le torse </option>
                                        <option value="upper_extremity">extrémité supérieure</option>
                                        <option value="unknown">inconnu</option>
                                    </select>
                                    
                                    
                                    
                                    <button type="submit" class="btn btn-primary mx-2">filtrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                
            </div>
        
        <!----------------- la partie main  ------------------------------->
        <content-component></content-component>
        
    </div>
    {{-- On garde ce code pour les routes de Login --}}
    {{-- @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>
        
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif --}}
    
    <script src="js/app.js"></script>
</body>
</html>
