<template>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary" v-text="this.title" >lesions par sexe</h6>
            
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas ref="myPieChart" v-if="sum(genderdata) != 0">
                </canvas>
                <div class="container text-center" v-else >
                    <img src="/images/undraw_blank_canvas.svg" class="img-fluid w-50" alt="vide">
                    <h4 class="h5">Vos informations sont vides, <a href="\photo">Ajoutez</a> des images pour les remplir</h4>
                </div>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Male
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Femelle
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Autre
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from 'chart.js';
export default {
    props:{
        genderdata:Array,
        title:String
    },
    mounted(){
	     var vm = this;
		var ctx= vm.$refs['myPieChart'];
		var PieChart = new Chart(ctx, {
		   	type:'doughnut',
		   	data: {
				labels: ["Male","femelle","Autre"],
			   	datasets:[{
					data:vm.genderdata,
					backgroundColor:['#4e73df', '#1cc88a', '#36b9cc'],
					hoverBackgroundColor:['#2e59d9', '#17a673', '#2c9faf'],
					hoverBorderColor: "rgba(234, 236, 244, 1)",
				}]
		   	},
		   	options: {
				maintainAspectRatio: false,
				tooltips: {
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#000",
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					caretPadding: 10,
				},
				legend: {
					display: false
				},
				cutoutPercentage: 80,
			},

	   });
    },

    methods:{
        sum:function (array) {
            var result = 0;
            array.forEach(element => {
                result = result + element;
            });
            return result;
        }
    },
}
</script>

<style>

</style>