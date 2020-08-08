<?php 
include '../config.php';
 
// mengaktifkan session
session_start();
if($_SESSION['status'] !="login"){
    header("location:../index.php");

}

$user = $_SESSION['username'];

$cek = $connection->query("SELECT sekarang,depan FROM khotib WHERE username = '$user'");
while($data = $cek->fetch_assoc())
{
    $sekarang = $data['sekarang'];
    $depan = $data['depan'];
};

$masjid = $connection->query("SELECT nama FROM user WHERE username = '$user'");
while($data = $masjid->fetch_assoc()){
			$namamasjid =  $data['nama'];
			};

?>
<!DOCTYPE html>
<html>
<head>
   <title>Jadwal Khotib</title>
   <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<body background="../img/3.jpg" style="background-size: 100%">
<table border="1" style="background-color: black; width: 100%">
	<caption><h1>Jadwal Khotib <?php echo $namamasjid; ?></h1></caption>
    <tr>
        <td>Jumat Sekarang</td>
        <td>Jum'at Depan</td>
    </tr>
    <tr>
        <td><?php echo $sekarang ; ?></td>
        <td><?php echo $depan ; ?></td>
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

		changePageAfter("http://localhost/Dismaweb/admin/pengumuman.php");
</script>
</body>
</html>