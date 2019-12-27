<template>
    <div class="container bg-white rounded border border-secondary shadow py-2 px-4">
        <h4 class="text-center pt-2 h5">Recherchez une image dans nôtre Collection de Bases d'images</h4>
        <div class="row">
            <div class="col-md col-12 px-2 py-2 cursor-pointer" v-for="item in this.data" v-bind:key="item.placeholder">
                <span class="text-center" v-text="item.placeholder"></span>
                <multiselect v-model="item.values" placeholder="Tous"
                    :searchable="false"
                    :close-on-select="false"
                    :show-labels="true"
                    :multiple="true"
                    track-by="name"
                    label="name"
                    :options="item.options" ></multiselect>
            </div>
            <div class="col-md-1 col-12 d-flex justify-content-end flex-row px-2 py-2">

                <form class="d-flex align-self-end" id="filterForm" action="/search" method="get">
                    <input type="hidden" name="_token" v-bind:value="csrf">
                    <input v-for="item in this.formData" v-bind:key="item.name" type="hidden" v-bind:value="item.value" v-bind:name="item.name">
                    <button type="submit" value="submit" class="btn btn-primary">Filtrer</button>
                </form>
            </div>
            <!-- <div class="col-md-4 col-12 px-2 py-2">
                <multiselect v-model="value" :searchable="false" :close-on-select="true" :show-labels="true" :multiple="true" placeholder="Catégorie de lésion" :options="this.options"></multiselect>
            </div>
            <div class="col-md-4 col-12 px-2 py-2">
                <multiselect v-model="value" :searchable="false" :close-on-select="true" :show-labels="true" :multiple="true" placeholder="Catégorie de lésion" :options="this.options"></multiselect>
            </div> -->
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
export default {
    name:'filterComponent',
    mounted(){
        var vm = this;
    },
    components:{
        Multiselect
    },
    props:{
        csrf:String
    },
    computed:{
        formData:function () {
            var result = [];
            this.data.forEach(element => {
                var string = '';
                if(element.values != []){
                    element.values.forEach(item => {
                    string = string + item.acronym + ',';
                });
                }
                result.push({name:element.attr, value:string});
            });
            return result;
        }
    },
    data:function () {
        return {
            options:['one','two','three'],
            value:[],

            data:[
                {
                    attr:'dx',
                    placeholder:'Catégorie de lésion',
                    values:[],
                    options:[
                        {
                            name:'Kératoses actiniques et carcinome intraépithélial',
                            acronym:'akiec',
                        },
                        {
                            name:'carcinome basocellulaire',
                            acronym:'bcc',
                        },
                        {
                            name:'lésions bénignes de type kératose',
                            acronym:'bkl',
                        },
                        {
                            name:'dermatofibroma',
                            acronym:'df',
                        },
                        {
                            name:'mélanome',
                            acronym:'mel',
                        },
                        {
                            name:'naevus mélanocytaires',
                            acronym:'nv',
                        },
                        {
                            name:'lésions vasculaires',
                            acronym:'vasc'
                        }
                    ]

                },
                {
                    attr:'dx_type',
                    placeholder:'Moyen de confirmation',
                    values:[],
                    options:[
                        {
                            name:'histopathology',
                            acronym:'histo'
                        },
                        {
                            name:'visite de suivi',
                            acronym:'follow-up'
                        },
                        {
                            name:"consensus d'experts",
                            acronym:'consensus'
                        },
                        {
                            name:'microscopie confocale',
                            acronym:'confocal'
                        },

                    ]
                },
                {
                    attr:'localization',
                    placeholder:'localisation de la lésion',
                    values:[],
                    options:[
                        {
                            name:'abdomen',
                            acronym:'abdomen'
                        },
                        {
                            name:'dos',
                            acronym:'back'
                        },
                        {
                            name:'poitrine',
                            acronym:'chest'
                        },
                        {
                            name:'oreille',
                            acronym:'ear'
                        },
                        {
                            name:'visage',
                            acronym:'face'
                        },
                        {
                            name:'pied',
                            acronym:'foot'
                        },
                        {
                            name:'génitale',
                            acronym:'genital'
                        },
                        {
                            name:'main',
                            acronym:'hand'
                        },
                        {
                            name:'membre inférieur',
                            acronym:'lower extremity'
                        },
                        {
                            name:'cou',
                            acronym:'neck'
                        },
                        {
                            name:'cuir chevelu',
                            acronym:'scalp'
                        },
                        {
                            name:'torse',
                            acronym:'trunk'
                        },
                        {
                            name:'membre supérieur',
                            acronym:'upper extremity'
                        },
                        {
                            name:'inconnue',
                            acronym:'unknown'
                        },

                    ]
                },
                {
                    attr:'sex',
                    placeholder:'sexe',
                    values:[],
                    options:[
                        {
                            name:'homme',
                            acronym:'male'
                        },
                        {
                            name:'femme',
                            acronym:'female'
                        },
                        {
                            name:'Autre',
                            acronym:'Other'
                        },
                    ]
                }
            ]
        };
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.multiselect__option{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.cursor-pointer{
    cursor: pointer;
}
</style>
