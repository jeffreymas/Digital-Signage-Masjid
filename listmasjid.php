<?php 
include 'config.php';
          
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Masjid</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<script src="javascript/admin.js"></script>
<body>
<div class="mfs-list-table-container">
  <div class="mfs-list-table-search">
    <h1>Pilih Masjid</h1>
    <form id="searchthis" action="carimasjid.php" style="display:inline;" method="post">
    <input id="namanyay-search-box" name="search" size="40" type="text" placeholder="Cari Nama Masjid"/>
    <input id="namanyay-search-btn" value="Search" type="submit"/>
    </form>
  </div>
  <table class="mfs-list-table">
    <tr>
      <th>Nama Masjid</th>
      <th>Garis Lintang</th>
      <th>Aksi</th>
    </tr>
    <?php 
      $masjid = $connection->query("SELECT nama,username FROM user ORDER BY nama DESC");
      while($data = $masjid->fetch_assoc()){
        echo "<tr>";
        $namamasjid =  $data['nama'];
        $username =  $data['username'];
        echo "<td>".$namamasjid."</td>";
        $namauser = $data['username'];
        $kabkot = $connection->query("SELECT id_kabkot FROM jadwal WHERE username = '$namauser'");
          while($data = $kabkot->fetch_assoc()){
          $id_kabkot =  $data['id_kabkot'];
            $namakota = $connection->query("SELECT nama_kabkot FROM kabkot WHERE id_kabkot = $id_kabkot");
            while($data = $namakota->fetch_assoc()){
            $namakabkot =  $data['nama_kabkot'];
            echo "<td>".$namakabkot."</td>";
            };
          };
        echo "<td><a href='executemasjid.php?id=$username'>Pilih</a></td></tr>";
        };
    ?>
  </table>
</div>
</body>

</html>
