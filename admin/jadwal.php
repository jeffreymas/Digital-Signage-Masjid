<?php 
include '../config.php';
 
// mengaktifkan session
session_start();
 if($_SESSION['status'] !="login"){
    header("location:../index.php");

}

$user = $_SESSION['username'];

$cek = $connection->query("SELECT id_kabkot FROM jadwal WHERE username = '$user'");
while($data = $cek->fetch_assoc())
{
    $kabkot = $data['id_kabkot'];
}
$nama_kabkot = $connection->query("SELECT * FROM kabkot WHERE id_kabkot = $kabkot");
while($data = $nama_kabkot->fetch_assoc()){
			$namakabupaten =  $data['nama_kabkot'];
			$latitude = $data['latitude'];
			$longitude = $data['longitude'];
			};

$masjid = $connection->query("SELECT nama FROM user WHERE username = '$user'");
while($data = $masjid->fetch_assoc()){
			$namamasjid =  $data['nama'];
			};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>DISMAWEB</title>

	<link rel="stylesheet" href="../css/main.css">	

</head>

<body background="../img/1.jpg" style="background-size: 100%">
	<center style="font-family: sans-serif; font-size: 20px;">DISMAWEB</center>
	<center style="font-family: sans-serif; font-size: 60px;"><?php echo $namamasjid ; ?></center>
	<br>
	<main style="background-color: black;margin-top: 20px;">
	<div class="kota">
		<p align="center" style="font-family: sans-serif;"><?php echo $namakabupaten ; ?>	
		</p>
		</div>
		<!-- DAY OF THE WEEK -->
		<div class="days">
		
			<div class="day">
				<p class="sunday">Ahad</p>
			</div>

			<div class="day">
				<p class="monday">Senin</p>
			</div>

			<div class="day">
				<p class="tuesday">Selasa</p>
			</div>

			<div class="day">
				<p class="wednesday">Rabu</p>
			</div>

			<div class="day">
				<p class="thursday">Kamis</p>
			</div>

			<div class="day">
				<p class="friday">Jum'at</p>
			</div>

			<div class="day">
				<p class="saturday">Sabtu</p>
			</div>

		</div>
		<!-- CLOCK -->
		<div class="clock">
			<!-- HOUR -->
			<div class="numbers">
				<p class="hours"></p>
				<p class="placeholder">88</p>
			</div>

			<div class="colon">
				<p>:</p>
			</div>

			<!-- MINUTE -->
			<div class="numbers">
				<p class="minutes"></p>
				<p class="placeholder">88</p>
			</div>

			<div class="colon">
				<p>:</p>
			</div>

			<!-- SECOND -->
			<div class="numbers">
				<p class="seconds"></p>
				<p class="placeholder">88</p>
			</div>


		</div><!-- END CLOCK -->
		<div class="pray">
			<p align="center" id="table"></p>
		</div>
		<input type="hidden" id="latitude" value=<?php echo $latitude;?>>
		<input type="hidden" id="longitude" value=<?php echo $longitude;?>>
	<style>
		#timetable {border-width: 1px; border-style: outset; border-collapse: collapse; border-color: gray; width: 9em;}
		#timetable td, #timetable th {border-width: 3px; border-spacing: 1px; padding: 10px 20px; border-style: inset; border-color: #CCCCCC;font-size:30px;}
		#timetable th {font-size:20px;color:black; text-align: center; font-weight: bold; background-color: #F8F7F4;}
	</style>

	<script src="../javascript/PrayTimes.js"></script>
	<script type="text/javascript">
	
	var date = new Date(); // today
	var latitude = document.getElementById('latitude').value;
	var longitude = document.getElementById('longitude').value;
	var times = prayTimes.getTimes(date, [latitude,longitude], +7);
	var list = ['imsak','Fajr', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];

	var html = '<table id="timetable">';
	html += '<tr><th colspan="2">'+ date.toLocaleDateString()+ '</th></tr>';
	for(var i in list)	{
		html += '<tr><td>'+ list[i]+ '</td>';
		html += '<td>'+ times[list[i].toLowerCase()]+ '</td></tr>';
	}
	html += '</table>';
	document.getElementById('table').innerHTML = html;

			function changePage(url) {
		  window.open(url, "_self");
		}

		function changePageAfter(url) {
		  setTimeout(function() {
		    changePage(url)
		  }, 30000);
		}

		changePageAfter("http://localhost/Dismaweb/admin/infaq.php");
	</script>
	<!-- CUSTOM JAVASCRIPT STYLESHEET -->
	<script src="../javascript/main.js"></script>
	</main>
</body>
</html>