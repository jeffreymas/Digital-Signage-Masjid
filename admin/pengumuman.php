<?php 
include '../config.php';
 
// mengaktifkan session
session_start();
if($_SESSION['status'] !="login"){
    header("location:../index.php");

}

$user = $_SESSION['username'];

$cek = $connection->query("SELECT pengumuman FROM pengumuman WHERE username = '$user'");
while($data = $cek->fetch_assoc())
{
    $pengumuman = $data['pengumuman'];
};

$masjid = $connection->query("SELECT nama FROM user WHERE username = '$user'");
while($data = $masjid->fetch_assoc()){
			$namamasjid =  $data['nama'];
			};

?>

<!DOCTYPE html>
<html>
<head>
   <title>Pengumuman</title>
   <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<body background="../img/4.jpg" style="background-size: 100%">
<table border="1" style="background-color: black;">
	<caption><h1>Pengumuman <?php echo $namamasjid; ?></h1></caption>
    <tr>
        <td style="max-width: 1200px; text-align: center;"><textarea style="width: 1200px; height: 100px; font-size: 45px; color: white; background-color: black;border:none;font-family: sans-serif;" disabled=""><?php echo $pengumuman ; ?></textarea></td>
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

		changePageAfter("http://localhost/Dismaweb/admin/jadwal.php");
</script>
</body>
</html>