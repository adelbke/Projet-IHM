<template>
<div>
    <nav class="navbar fixed-top navbar-expand-lg bg-transparent">
        <a class="navbar-brand mr-5" href="#">Logo
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <i class="fa fab fa-facebook"></i> -->
            <!-- <i class="fas fa-hospital text-white   "></i> -->
            <i class="fas fa-caret-down text-white   "></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item mx-2" v-for="item in links" v-bind:key="item.name">
                    <a v-if="!Array.isArray(item)" class="nav-link text-shadow font-weight-bold text-white hvr-underline-center-out hvr-grow" v-text="item.name" v-bind:href="item.href"> <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
            <div class="form-inline">
                <div class="nav-item border-right pr-2 border-right">
                    <a name="" id="" class="btn btn-primary rounded-0 text-white p-1" href="#" role="button">S'inscrire</a>
                </div>

                <div class="nav-item">
                    <a name="" id="" class="btn btn-link" href="#" role="button">Se Connecter</a>
                </div>
            </div>
        </div>
    </nav>
</div>
</template>

<script>
import 'hover.css';
export default {

    data: function () {  
        return {
            links:[
                {
                    name:'Accueil',
                    href:'/'
                },
                {
                    name:'Contact',
                    href:'/Contact'
                },
                {
                    name:'À propos',
                    href:'/about'
                }
            ]
        };
    }

}
</script>

<style scoped>
.nav-link{
    text-shadow: 0px 0px 50px black;
}

</style>