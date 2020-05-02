<?php
include('praktikum_koneksi.php');
$covid = mysqli_query($koneksi,"select * from covid");
while($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['country'];
	$jumlah_kasus[] = $row['new case'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Perbandingan Kasus Baru Covid 10 Negara</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<h2><center>GRAFIK PERBANDINGAN KASUS BARU COVID 10 NEGARA</center></h2><br>
	<b>GRAFIK BAR</b>
	<div style="width: 800px;height: 450px;">
		<canvas id="Chart-bar"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("Chart-bar").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Kasus Baru Covid di setiap Negara',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: 'rgba(220, 20, 60, 1)',
					borderColor: 'rgba(220, 20, 60,1)',
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
	<b>GRAFIK LINE</b>
	<div style="width: 800px;height: 450px;">
		<canvas id="Chart-line"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("Chart-line").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Kasus Baru Covid di setiap Negara',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: 'rgba(244, 164, 95, 0.5)',
					borderColor: 'rgba(244, 164, 95,1)',
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
	</script><br><br>
	<b>GRAFIK PIE</b><br><br>
	<div style="width: 900px;height: 450px;">
		<canvas id="Chart-pie"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("Chart-pie").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Kasus Baru Covid di setiap Negara',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: [
					'rgba(25, 25, 112, 0.7)',
					'rgba(220, 20, 60, 0.7)',
					'rgba(19, 100, 0, 0.7)',
					'rgba(139, 0, 140, 0.7)',
					'rgba(251, 140, 1, 0.7)',
					'rgba(47, 79, 79, 0.7)',
					'rgba(30, 144, 255, 0.7)',
					'rgba(40, 178, 170, 0.7)',
					'rgba(250, 99, 71, 0.7)',
					'rgba(255, 255, 0, 0.7)'
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
				}]
			},
			options: {
				responsive:true
			}
		});
	</script><br><br>
	<b>GRAFIK DOUGHNUT</b><br><br>
	<div style="width: 900px;height: 450px;">
		<canvas id="Chart-do"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("Chart-do").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Grafik Kasus Baru Covid di setiap Negara',
					data: <?php echo json_encode($jumlah_kasus); ?>,
					backgroundColor: [
					'rgba(25, 25, 112, 0.7)',
					'rgba(220, 20, 60, 0.7)',
					'rgba(19, 100, 0, 0.7)',
					'rgba(139, 0, 140, 0.7)',
					'rgba(251, 140, 1, 0.7)',
					'rgba(47, 79, 79, 0.7)',
					'rgba(30, 144, 255, 0.7)',
					'rgba(40, 178, 170, 0.7)',
					'rgba(250, 99, 71, 0.7)',
					'rgba(255, 255, 0, 0.7)'
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
				}]
			},
			options: {
				responsive:true
			}
		});
	</script>
</body>
</html>