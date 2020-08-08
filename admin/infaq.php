<?php 
include '../config.php';
 
// mengaktifkan session
session_start();

if($_SESSION['status'] !="login"){
	header("location:../index.php");

}

$user = $_SESSION['username'];

$cek = $connection->query("SELECT total FROM infaq WHERE username = '$user'");
while($data = $cek->fetch_assoc())
{
    $infaq = $data['total'];
};

$masjid = $connection->query("SELECT nama FROM user WHERE username = '$user'");
while($data = $masjid->fetch_assoc()){
			$namamasjid =  $data['nama'];
			};

?>
<!DOCTYPE html>
<html>
<head>
   <title>INFAQ</title>
   <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<body background="../img/2.jpg">
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

		changePageAfter("http://localhost/Dismaweb/admin/khotib.php");
</script>
</body>
</html>