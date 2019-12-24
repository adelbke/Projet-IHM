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
            <navbar-component></navbar-component>
            <div style="background:linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) ),url('https://freerangestock.com/sample/120965/overhead-view-of-a-laptop-and-a-stethoscope--medical-work.jpg');height:500px;width:100%; background-size:cover; " 
            class="container-fluid pt-5">

            <div class="container ">
                <div class="mt-5">
                    <h1 class="text-center text-white"> ASIC </h1>
                    <p class="text-center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi excepturi totam eveniet, blanditiis id velit quasi itaque deserunt vitae. Architecto non est harum laudantium minus ea alias provident nulla quisquam.</p>

                </div>
            </div>
                <div class="filter-bar row mt-5">
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
                </div>
            </div>

            <!----------------- la partie main  ------------------------------->
<<<<<<< Updated upstream
             <content-component></content-component>
            
=======

            <nav class="main-acc main-sm">
              <div ><span class="icon icon-search"></span></div>
              <div class="main-acc-tit"><h1>résultats de recherche</h1></div>
           </nav>

           <main class="main"> 
                  <div class="container">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed voluptatem quo placeat vel accusamus necessitatibus consequatur sit doloribus atque minus? Ullam dignissimos iste, assumenda tenetur pariatur officia quibusdam dolore voluptas.
                        Corrupti velit incidunt asperiores molestiae alias neque assumenda facilis, voluptates tenetur sunt animi autem. Excepturi inventore adipisci, voluptatibus magni quo hic! Nam veritatis quisquam inventore deleniti architecto totam perferendis numquam!
                        Amet porro iure nisi ex quod doloribus beatae ullam facere? Odio voluptatem repudiandae, expedita quo, optio quos ex incidunt error rem eum reiciendis suscipit. Qui voluptatem nobis reprehenderit animi enim.
                        Dicta quas perspiciatis et suscipit molestias, explicabo repellendus molestiae commodi, unde nemo possimus tenetur laborum quod maiores alias rerum. Libero cumque ex quia inventore corporis in quis iusto iste repellat.
                        Officia, dolorum ratione, pariatur eos eligendi delectus sunt, aspernatur laborum maxime earum sequi maiores ipsum. Maiores id delectus neque dicta tempora optio numquam vel! Aspernatur culpa dignissimos suscipit obcaecati optio.
                        Odio, earum. Accusantium fugiat officiis nobis illo sunt error voluptas velit fuga voluptate numquam perferendis repellat dicta dignissimos maiores optio, facilis maxime! Nulla earum voluptatem totam, doloribus sit corporis qui.
                        Aperiam molestias tenetur nisi nam amet fugit mollitia omnis. Provident doloremque, quae animi aut deserunt, ea fugit hic quos recusandae voluptate consequatur esse blanditiis rem commodi neque omnis sed delectus.
                        Praesentium temporibus deserunt rem unde quae cumque numquam, repellat provident ipsum voluptas magni esse animi, tempora modi amet, facere beatae nobis eum iusto officiis hic ab magnam ad. Exercitationem, a?
                        Asperiores temporibus accusamus facere porro quod ipsum eius nam pariatur sapiente sit at fuga, consectetur, quae quo incidunt voluptates nihil, fugiat sequi voluptatum provident harum assumenda qui tempora. Quod, non?
                        Quo odio quibusdam, esse ab itaque placeat quaerat! Doloribus, qui magni, ullam reiciendis dolorem hic aliquid eveniet blanditiis perferendis quaerat est totam suscipit enim accusantium ea ipsum numquam iusto! Suscipit.
                        Dolorem quos ducimus sint fugiat reprehenderit! Dicta quaerat at accusamus consequuntur reiciendis, molestiae reprehenderit in vero est. Distinctio, dicta, tempora atque ab sint, in quo est accusamus consequatur deleniti sapiente.
                        Ut, animi voluptatibus cupiditate et ipsam, quia fugit doloribus nihil architecto cum commodi. Recusandae quasi voluptas consequuntur reiciendis corporis facilis molestias hic expedita. Quia itaque natus quibusdam id ex molestias?
                        Nobis, est iste aliquam facere error fuga ea nulla qui consequatur nemo eum. Sint magnam laboriosam alias id veniam odit voluptatibus aliquid, ipsum expedita nobis quidem, harum dolor, delectus ducimus.
                        Maxime obcaecati cupiditate nostrum repellendus reprehenderit impedit est dolores ut tenetur. Iste impedit velit molestias esse repudiandae beatae alias repellendus voluptas placeat aliquam tempore molestiae atque id enim, distinctio officia?
                        Nam provident, sequi sapiente error quibusdam magni doloribus aspernatur magnam, itaque mollitia numquam? Dolorem, distinctio! Laudantium pariatur ipsum maxime, obcaecati eligendi numquam? Cum quia vitae provident voluptate excepturi illo distinctio.
                        Numquam harum nesciunt, ipsum inventore maiores repellendus? Tempore eligendi debitis, mollitia, alias modi ad nam adipisci quas eaque quaerat dignissimos provident eius necessitatibus molestiae cum pariatur praesentium! Incidunt, nam nemo?
                    </p>

                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">
                    <img src="images/200x200.gif" alt="..." class="img-thumbnail">

                  </div>
           </main>

           <section class="contact">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, harum accusantium? Atque quae veniam incidunt facere nostrum qui illum architecto! Amet eius quasi vitae cupiditate assumenda asperiores, mollitia dolores totam?
            Quas distinctio rerum porro harum numquam voluptates eum maxime laboriosam quia vero, labore consequatur pariatur dolore impedit velit itaque officia laborum, suscipit doloremque adipisci reiciendis minus? Aut, unde! Fugit, iusto?
            Quo amet asperiores, numquam omnis eaque doloremque repellat, provident laboriosam esse ipsum eos tempora aliquam magnam pariatur accusamus. Possimus dolores laboriosam modi praesentium? Aliquid sunt officia voluptatibus similique ratione! Quaerat!
            Labore, voluptates esse provident dicta voluptatum reprehenderit eum sed deserunt quis facere saepe ipsum! In id nisi vero illum, quod molestiae alias quos illo atque ducimus nihil sunt ex at.
            Aspernatur, soluta beatae? Facilis voluptatem quasi repellendus, eius id deserunt totam expedita rem veritatis ea dolore harum, similique accusamus officiis dolor praesentium, natus unde. Ipsam sint sit delectus nobis aliquid?
            Magni optio corrupti inventore, aliquid dolorum quia repellat molestias laboriosam voluptatum fuga totam doloribus omnis nostrum doloremque! Hic itaque cupiditate esse adipisci beatae in, eaque, distinctio nemo voluptate eos excepturi.
            Maiores consequuntur amet quam veritatis sed ad porro perspiciatis quibusdam minima rem. Laborum sapiente architecto porro, quaerat, at excepturi labore cumque, nobis aspernatur similique fuga molestias nostrum possimus non fugit!
            Rerum dolore cum, repellat deserunt provident iste quo debitis dignissimos unde? Molestiae vel facilis architecto officia consectetur fugit voluptas inventore, quasi natus culpa officiis corrupti tempora quisquam amet? Deleniti, fugiat!
            Commodi aliquam facilis magnam nesciunt alias iure dolorem numquam consequuntur, quod enim ipsam illo aperiam doloribus recusandae voluptatem hic itaque? Deleniti, ea! Voluptate accusamus odit iure, commodi ex sapiente temporibus?
            Repellendus aliquam, quaerat nulla, minus dicta laudantium maxime iure ullam ratione, perferendis quia soluta facilis rem reprehenderit numquam repellat illo ab enim dolor placeat explicabo facere iste nam. Nihil, eaque?
            Cumque itaque cum asperiores harum sit porro quos eum. Nisi aliquam doloremque nulla eius optio at porro maxime obcaecati quisquam ex fuga sequi enim laborum molestiae possimus provident, voluptate aperiam.
            Neque quibusdam ex esse! Beatae, deleniti nam at, ipsam rerum eos odit ad voluptatem vitae magnam veniam assumenda quidem esse expedita voluptas incidunt dolores asperiores ea aut earum. Fuga, saepe!</p>

        </section>


           <section class="apropos">
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, harum accusantium? Atque quae veniam incidunt facere nostrum qui illum architecto! Amet eius quasi vitae cupiditate assumenda asperiores, mollitia dolores totam?
               Quas distinctio rerum porro harum numquam voluptates eum maxime laboriosam quia vero, labore consequatur pariatur dolore impedit velit itaque officia laborum, suscipit doloremque adipisci reiciendis minus? Aut, unde! Fugit, iusto?
               Quo amet asperiores, numquam omnis eaque doloremque repellat, provident laboriosam esse ipsum eos tempora aliquam magnam pariatur accusamus. Possimus dolores laboriosam modi praesentium? Aliquid sunt officia voluptatibus similique ratione! Quaerat!
               Labore, voluptates esse provident dicta voluptatum reprehenderit eum sed deserunt quis facere saepe ipsum! In id nisi vero illum, quod molestiae alias quos illo atque ducimus nihil sunt ex at.
               Aspernatur, soluta beatae? Facilis voluptatem quasi repellendus, eius id deserunt totam expedita rem veritatis ea dolore harum, similique accusamus officiis dolor praesentium, natus unde. Ipsam sint sit delectus nobis aliquid?
               Magni optio corrupti inventore, aliquid dolorum quia repellat molestias laboriosam voluptatum fuga totam doloribus omnis nostrum doloremque! Hic itaque cupiditate esse adipisci beatae in, eaque, distinctio nemo voluptate eos excepturi.
               Maiores consequuntur amet quam veritatis sed ad porro perspiciatis quibusdam minima rem. Laborum sapiente architecto porro, quaerat, at excepturi labore cumque, nobis aspernatur similique fuga molestias nostrum possimus non fugit!
               Rerum dolore cum, repellat deserunt provident iste quo debitis dignissimos unde? Molestiae vel facilis architecto officia consectetur fugit voluptas inventore, quasi natus culpa officiis corrupti tempora quisquam amet? Deleniti, fugiat!
               Commodi aliquam facilis magnam nesciunt alias iure dolorem numquam consequuntur, quod enim ipsam illo aperiam doloribus recusandae voluptatem hic itaque? Deleniti, ea! Voluptate accusamus odit iure, commodi ex sapiente temporibus?
               Repellendus aliquam, quaerat nulla, minus dicta laudantium maxime iure ullam ratione, perferendis quia soluta facilis rem reprehenderit numquam repellat illo ab enim dolor placeat explicabo facere iste nam. Nihil, eaque?
               Cumque itaque cum asperiores harum sit porro quos eum. Nisi aliquam doloremque nulla eius optio at porro maxime obcaecati quisquam ex fuga sequi enim laborum molestiae possimus provident, voluptate aperiam.
               Neque quibusdam ex esse! Beatae, deleniti nam at, ipsam rerum eos odit ad voluptatem vitae magnam veniam assumenda quidem esse expedita voluptas incidunt dolores asperiores ea aut earum. Fuga, saepe!</p>

           </section>

>>>>>>> Stashed changes
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
