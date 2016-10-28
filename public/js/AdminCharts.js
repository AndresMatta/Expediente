$(document).ready(function(){
	var datosEmpresa = {
		headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
		type : "pie",
		data: {
			datasets: [{
				data : [ 25, 10, 40, 12, 23],
				backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360" ],
			}],
			labels : ["Coopelesca", "Coopemep", "BCR", "Redbrige", "Panamerican"],
		}, 
		options: {
			responsive: true
		}
	};

	var PacAnuales = {
		headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
		type : "line",
		data: {
			labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			datasets: [
			{
				label:'# de Pacientes Totales',
				data : [ 25, 10, 40, 12, 23, 10, 23, 44, 52, 12, 32, 23],
				lineTension: 0.1,
	            backgroundColor: "rgba(75,192,192,0.4)",
	            borderColor: "rgba(75,192,192,1)",
	            borderCapStyle: 'butt',
	            borderDash: [],
	            borderDashOffset: 0.0,
	            borderJoinStyle: 'miter',
	            pointBorderColor: "rgba(75,192,192,1)",
	            pointBackgroundColor: "#fff",
	            pointBorderWidth: 1,
	            pointHoverRadius: 5,
	            pointHoverBackgroundColor: "rgba(75,192,192,1)",
	            pointHoverBorderColor: "rgba(220,220,220,1)",
	            pointHoverBorderWidth: 2,
	            pointRadius: 1,
	            pointHitRadius: 10,
	            spanGaps: false,
			},
			{
				label:'# de Pacientes Empresa',
				data : [ 11, 4, 20, 5, 9, 2, 12, 22, 27, 3, 14, 9],
				lineTension: 0.1,
	            backgroundColor: "rgba(249,11,11,0.4)",
	            borderColor: "rgba(249,11,11,1)",
	            borderCapStyle: 'butt',
	            borderDash: [],
	            borderDashOffset: 0.0,
	            borderJoinStyle: 'miter',
	            pointBorderColor: "rgba(249,11,11,1)",
	            pointBackgroundColor: "#fff",
	            pointBorderWidth: 1,
	            pointHoverRadius: 5,
	            pointHoverBackgroundColor: "rgba(249,11,11,1)",
	            pointHoverBorderColor: "rgba(220,220,220,1)",
	            pointHoverBorderWidth: 2,
	            pointRadius: 1,
	            pointHitRadius: 10,
	            spanGaps: false,
			}
			],
		}, 
		options: {
			responsive: true
		}
	};

	var DocMensuales = {
		headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
		type : "bar",
		data: {
        labels: ["Dr.Araya", "Dr.Wilson", "Dr.Alvarez", "Dr.Brenes", "Dr.Soto", "Dra.Maroto"],
        datasets: [{
            label: '# de Pacientes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(151, 242, 13, 0.2)',
                'rgba(156, 37, 152, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
};

	var empresa = document.getElementById('empresa').getContext('2d');
	var mensuales = document.getElementById('mensuales_medico').getContext('2d');
	var anuales = document.getElementById('pac_anuales').getContext('2d');
	window.pie = new Chart(empresa, datosEmpresa);
	window.pie = new Chart(mensuales, DocMensuales);
	window.pie = new Chart(anuales, PacAnuales);

});