<template>
<div>
    <nav class="navbar navbar-expand-lg bg-white">
        <a class="navbar-brand mr-5" href="/">Logo
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <i class="fa fab fa-facebook"></i> -->
            <!-- <i class="fas fa-hospital text-white   "></i> -->
            <i class="fas fa-caret-down text-dark"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item mx-md-2 mx-auto" v-for="item in links" v-bind:key="item.name">
                    <a v-if="!Array.isArray(item)" class="nav-link font-weight-bold text-dark hvr-underline-center-out hvr-grow" v-text="item.name" v-bind:href="item.href"> <span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <div class="form-inline" v-if="firstName == undefined && lastName == undefined">
                <div class="nav-item border-right pr-2 border-right">
                    <a name="" id="" class="btn btn-primary rounded-0 text-white p-1" href="/register" role="button">S'inscrire</a>
                </div>

                <div class="nav-item">
                    <a name="" id="" class="btn btn-link" href="/login" role="button">Se Connecter</a>
                </div>
            </div>
            <div class="form-inline" v-else>
                <div class="dropdown border rounded">
                    <button class="btn btn-link text-dark dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"
                            v-text="'Bonjour, ' + firstName + ' ' + lastName" >
                                Dropdown
                            </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a href="/Dashboard" class="dropdown-item">
                            <i class="fas fa-tachometer-alt fa-sm"></i>
                            Tableau de bord
                        </a>


                        <form class="" action="/logout" method="post">
                            <input type="hidden" name="_token" v-bind:value="csrf">
                            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Déconnexion</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
</template>

<script>
import 'hover.css';
export default {
    name:'navbar',
    props:[
        'first-name',
        'last-name',
        'csrf'
    ],

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


</style>
