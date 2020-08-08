<?php 
include '../config.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php");

  
}
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<script src="../javascript/admin.js"></script>
<body>
    <nav class = "nav-primary" role = "navigation">
  <ul role = "menubar">
    <li role = "presentation"><a href = "index.php" role = "menuitem">Pilih Daerah</a></li>
    <li role = "presentation"><a href = "inputinfaq.php" role = "menuitem">Infaq</a></li>
    <li role = "presentation"><a href = "inputkhotib.php" role = "menuitem">Khotib</a></li>
    <li role = "presentation"><a href = "inputpengumuman.php" role = "menuitem">Pengumuman</a></li>
    <li role = "presentation"><a href = "jadwal.php" role = "menuitem">Tampilkan Jadwal</a></li>
    <li role = "presentation"><a href = "edituser.php" role = "menuitem">Edit Profile</a></li>
    <li role = "presentation"><a href = "logout.php" role = "menuitem">Logout</a></li>
  </ul>
</nav>
<div class="mfs-list-table-container">
  <div class="mfs-list-table-search">
    <h3>Pilihlah daerah terlebih dahulu agar tampilan jadwal dapat diakses</h3>
    <h1>Pilih Daerah</h1>
    <form id="searchthis" action="cari.php" style="display:inline;" method="post">
    <input id="namanyay-search-box" name="search" size="40" type="text" placeholder="Cari Daerah"/>
    <input id="namanyay-search-btn" value="Search" type="submit"/>
    </form>
  </div>
  <table class="mfs-list-table">
    <tr>
      <th>Nama Kabupaten/Kota</th>
      <th>Garis Lintang</th>
      <th>Garis Bujur</th>
      <th>Aksi</th>
    </tr>
    <?php 
    $search = $_POST['search'];
    $query = "SELECT * FROM kabkot WHERE nama_kabkot LIKE '%$search%'";
    $result = $connection->query($query);
    while($data = $result->fetch_assoc()) {         
        echo "<tr>";
        echo "<td>".$data['nama_kabkot']."</td>";
        echo "<td>".$data['latitude']."</td>";
        echo "<td>".$data['longitude']."</td>";    
        echo "<td><a href='proses.php?id=$data[id_kabkot]'>Pilih</a></td></tr>";        
    }
    ?>
  </table>
  
</div>
</body>

</html>
