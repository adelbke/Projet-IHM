<template>
  <div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Lésions de la base de données par type</h6>
		</div>
		<div class="card-body">
			<div class="chart-bar">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
			<canvas id="myBarChart" width="669" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
		</div>
		<hr>
		</div>
	</div>
</template>

<script>
export default {
	props:{
		data:Object
	},
	computed:{
		max: function () {  
			var vm = this;	
			var max = 0;
			Object.keys(vm.data).forEach(key =>{
				if(max <vm.data[key]){
					max = vm.data[key];
				}
			});
			return max;
		}
	},
	mounted(){
		function number_format(number, decimals, dec_point, thousands_sep) {
				// *     example: number_format(1234.56, 2, ',', ' ');
				// *     return: '1 234,56'
				number = (number + '').replace(',', '').replace(' ', '');
				var n = !isFinite(+number) ? 0 : +number,
					prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
					sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
					dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
					s = '',
					toFixedFix = function(n, prec) {
					var k = Math.pow(10, prec);
					return '' + Math.round(n * k) / k;
					};
				// Fix for IE parseFloat(0.55).toFixed(0) = 0;
				s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
				if (s[0].length > 3) {
					s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
				}
				if ((s[1] || '').length < prec) {
					s[1] = s[1] || '';
					s[1] += new Array(prec - s[1].length + 1).join('0');
				}
				return s.join(dec);
				}
		// Bar Chart Example
		var vm = this;
		var ctx = document.getElementById("myBarChart");
		var myBarChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Kératoses actiniques et carcinome intraépithélial",
			"carcinome basocellulaire", "lésions bénignes de type kératose", "dermatofibroma", "mélanome", "naevus mélanocytaires","lésions vasculaires"],
			datasets: [{
			label: "Nombre de Cas",
			backgroundColor: "#4e73df",
			hoverBackgroundColor: "#2e59d9",
			borderColor: "#4e73df",
			data: [vm.data.akiec, vm.data.bcc, vm.data.bkl, vm.data.df, vm.data.mel, vm.data.nv,vm.data.vasc],
			}],
		},
		options: {
			maintainAspectRatio: false,
			layout: {
			padding: {
				left: 10,
				right: 25,
				top: 25,
				bottom: 0
			}
			},
			scales: {
			xAxes: [{
				time: {
				unit: 'lesion'
				},
				gridLines: {
				display: false,
				drawBorder: false
				},
				ticks: {
				maxTicksLimit: 6
				},
				maxBarThickness: 25,
			}],
			yAxes: [{
				ticks: {
				min: 0,
				max: vm.max,
				maxTicksLimit: 5,
				padding: 10,
				// Include a dollar sign in the ticks
				callback: function(value, index, values) {
					return number_format(value) + ' lesions';
				}
				},
				gridLines: {
				color: "rgb(234, 236, 244)",
				zeroLineColor: "rgb(234, 236, 244)",
				drawBorder: false,
				borderDash: [2],
				zeroLineBorderDash: [2]
				}
			}],
			},
			legend: {
			display: false
			},
			tooltips: {
			titleMarginBottom: 10,
			titleFontColor: '#6e707e',
			titleFontSize: 14,
			backgroundColor: "rgb(255,255,255)",
			bodyFontColor: "#858796",
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
			callbacks: {
				label: function(tooltipItem, chart) {
				var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
				return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+ " lesions";
				}
			}
			},
		}
		});
	},

}
</script>

<style>

</style>