<template>
    <div data-aos="fade" class="container bg-white rounded border border-secondary shadow py-2 px-4">
        <h4 class="text-center pt-2 h5">Recherchez une image dans nôtre Collection de Bases d'images</h4>
        <div class="row">
            <div class="col-md col-12 px-2 py-2 cursor-pointer" v-for="item in this.data" v-bind:key="item.placeholder">
                <span class="text-center" v-text="item.placeholder"></span>
                <multiselect v-model="item.values" placeholder="Tous"
                    :searchable="false"
                    :close-on-select="false"
                    :show-labels="true"
                    :multiple="true"
                    selectLabel=""
                    selectedLabel=""
                    deselectLabel=""
                    deselectGroupLabel=""
                    track-by="name"
                    label="name"
                    :options="item.options" class="bg-light" ></multiselect>
            </div>
            <div class="col-md-2 col-12 px-2 py-2">
                <span class="text-center">Age:</span>
				<div class="row">
                	<input type="number" class="form-control col mx-1 form-control-sm" min="1" max="120" name="ageMin" id="ageMin" placeholder="Min" v-model="minimumAge">
                	<input type="number" class="form-control col mx-1 form-control-sm" min="1" max="120" name="ageMax" id="ageMax" placeholder="Max" v-model="maximumAge">
				</div>

            </div>
        </div>
		<div class="row">
			<div class="col-12 d-flex justify-content-center flex-row px-2 py-2">
                <form class="d-flex align-self-end" id="filterForm" action="/search" method="get">
                    <input type="hidden" name="_token" v-bind:value="csrf">
                    <input v-for="item in this.formData" v-bind:key="item.name" type="hidden" v-bind:value="item.value" v-bind:name="item.name">
                    <button type="submit" id="FilterButton" value="submit" class="btn btn-primary">Filtrer</button>
                </form>
            </div>
		</div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import AOS from 'aos';
export default {
    name:'filterComponent',
    mounted(){
        AOS.init();
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
            var vm = this;
            var result = [];
            this.data.forEach(element => {
                var string = '';
                if(element.values != []){
                    element.values.forEach(item => {
                        string = string + item.acronym + ',';
					});
					string = string.substring(0, string.length - 1);
                }
                result.push({name:element.attr, value:string});
			});
                if(vm.maximumAge == Number)
                    {result.push({name:'ageMax',value:120});}
                else
                    {result.push({name:'ageMax',value:vm.maximumAge});}

                if(vm.minimumAge == Number)
                    {result.push({name:'ageMin',value:1})}
                else
                    {result.push({name:'ageMin',value:vm.minimumAge});}

            return result;
        }
    },
    data:function () {
        return {
            options:['one','two','three'],
            value:[],

            minimumAge: Number,
            maximumAge: Number,

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
                            acronym:'unknown'
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
@import '~aos/dist/aos.css';
.multiselect__option{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.cursor-pointer{
    cursor: pointer;
}
</style>
