<?php
include('praktikum_koneksi.php');
$covid = mysqli_query($koneksi,"select * from covid");
while($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['country'];
	$new_case[] = $row['new case'];
	$total_death[] = $row['total death'];
	$new_death[] = $row['new death'];
	$total_recovered[] = $row['total recovered'];
	$active_case[] = $row['active case'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Perbandingan Kasus Covid 10 Negara</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<h2><center>GRAFIK PERBANDINGAN KASUS COVID 10 NEGARA</center></h2><br>
	<b>GRAFIK BAR</b>
	<div style="width: 1100px;height: 600px;">
		<canvas id="Chart-bar"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("Chart-bar").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Kasus Baru',
					data: <?php echo json_encode($new_case); ?>,
					backgroundColor: 'rgba(220, 20, 60, 1)',
					borderColor: 'rgba(220, 20, 60,1)',
					borderWidth: 1
				}, {
					label: 'Jumlah Kematian',
					data: <?php echo json_encode($total_death); ?>,
					backgroundColor: 'rgba(70, 130, 180, 1)',
					borderColor: 'rgba(70, 130, 180,1)',
					borderWidth: 1
				}, {
					label: 'Kematian Baru',
					data: <?php echo json_encode($new_death); ?>,
					backgroundColor: 'rgba(46, 139, 87, 1)',
					borderColor: 'rgba(46, 139, 87,1)',
					borderWidth: 1
				}, {
					label: 'Jumlah Kesembuhan',
					data: <?php echo json_encode($total_recovered); ?>,
					backgroundColor: 'rgba(252, 165, 3, 1)',
					borderColor: 'rgba(252, 165, 3,1)',
					borderWidth: 1
				}, {
					label: 'Jumlah Kematian',
					data: <?php echo json_encode($total_death); ?>,
					backgroundColor: 'rgba(252, 192, 203, 1)',
					borderColor: 'rgba(252, 192, 203,1)',
					borderWidth: 1
				}, {
					label: 'Kasus Aktif',
					data: <?php echo json_encode($active_case); ?>,
					backgroundColor: 'rgba(147, 112, 219, 1)',
					borderColor: 'rgba(147, 112, 219,1)',
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
	<b>GRAFIK LINE</b>
	<div style="width: 1100px;height: 600px;">
		<canvas id="Chart-line"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("Chart-line").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Kasus Baru',
					data: <?php echo json_encode($new_case); ?>,
					backgroundColor: 'rgba(220, 20, 60, 0)',
					borderColor: 'rgba(220, 20, 60,1)',
					borderWidth: 1
				}, {
					label: 'Jumlah Kematian',
					data: <?php echo json_encode($total_death); ?>,
					backgroundColor: 'rgba(70, 130, 180, 0)',
					borderColor: 'rgba(70, 130, 180,1)',
					borderWidth: 1
				}, {
					label: 'Kematian Baru',
					data: <?php echo json_encode($new_death); ?>,
					backgroundColor: 'rgba(46, 139, 87, 0)',
					borderColor: 'rgba(46, 139, 87,1)',
					borderWidth: 1
				}, {
					label: 'Jumlah Kesembuhan',
					data: <?php echo json_encode($total_recovered); ?>,
					backgroundColor: 'rgba(252, 165, 3, 0)',
					borderColor: 'rgba(252, 165, 3,1)',
					borderWidth: 1
				}, {
					label: 'Jumlah Kematian',
					data: <?php echo json_encode($total_death); ?>,
					backgroundColor: 'rgba(252, 192, 203, 0)',
					borderColor: 'rgba(252, 192, 203,1)',
					borderWidth: 1
				}, {
					label: 'Kasus Aktif',
					data: <?php echo json_encode($active_case); ?>,
					backgroundColor: 'rgba(147, 112, 219, 0)',
					borderColor: 'rgba(147, 112, 219,1)',
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
</body>
</html>