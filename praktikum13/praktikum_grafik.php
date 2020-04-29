<?php
include('praktikum_koneksi.php');
$covid = mysqli_query($koneksi,"select * from covid");
while($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['country'];
	$jumlah_kasus[] = $row['total case'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Perbandingan Total Case Covid 10 Negara</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<h2><center>GRAFIK PERBANDINGAN TOTAL CASE COVID 10 NEGARA</center></h2><br>
	<b>GRAFIK BAR</b>
	<div style="width: 800px;height: 450px;">
		<canvas id="myChart"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Total Covid di setiap Negara',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: 'rgba(0, 0, 139, 0.2)',
					borderColor: 'rgba(0, 0, 139,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	<b>GRAFIK PIE</b><br><br>
	<div id="canvas-holder" style="width:50%;">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: [
					'rgba(25, 25, 112, 0.2)',
					'rgba(220, 20, 60, 0.2)',
					'rgba(19, 100, 0, 0.2)',
					'rgba(139, 0, 140, 0.2)',
					'rgba(251, 140, 1, 0.2)',
					'rgba(47, 79, 79, 0.2)',
					'rgba(30, 144, 255, 0.2)',
					'rgba(40, 178, 170, 0.2)',
					'rgba(250, 99, 71, 0.2)',
					'rgba(255, 255, 0, 0.2)'
					],
					borderColor: [
					'rgba(25, 25, 112,1)',
					'rgba(220, 20, 60, 1)',
					'rgba(19, 100, 0, 1)',
					'rgba(139, 0, 140, 1)',
					'rgba(251, 140, 1, 1)',
					'rgba(47, 79, 79, 1)',
					'rgba(30, 144, 255, 1)',
					'rgba(40, 178, 170, 1)',
					'rgba(250, 99, 71, 1)',
					'rgba(255, 255, 0, 1)'
					],
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>
</html>