<?php 
include 'config.php';
 
// mengaktifkan session
session_start();

if($_SESSION['masjid'] ==""){
	header("location:index.php");

}

$masjid = $_SESSION['masjid'];

$cek = $connection->query("SELECT total FROM infaq WHERE username = '$masjid'");
while($data = $cek->fetch_assoc())
{
    $infaq = $data['total'];
};

$nama = $connection->query("SELECT nama FROM user WHERE username = '$masjid'");
while($data = $nama->fetch_assoc()){
	$namamasjid =  $data['nama'];
};

?>
<!DOCTYPE html>
<html>
<head>
   <title>INFAQ</title>
   <link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body background="img/2.jpg">
	<table border="1" style="background-color: black; width: 70%;">
		<caption><h1>Infaq <?php echo $namamasjid; ?></h1></caption>
    	<tr>
        	<td>Total Infaq</td>
    	</tr>
    	<tr>
        	<td>Rp.<?php echo $infaq ;?></td>
    	</tr>
	</table>

<script type="text/javascript">
	function changePage(url) {
		  window.open(url, "_self");
		}

		function changePageAfter(url) {
		  setTimeout(function() {
		    changePage(url)
		  }, 30000);
		}

		changePageAfter("http://localhost/Dismaweb/khotibuser.php");
</script>
</body>
</html>