<?php

include '../config.php';

session_start();
if($_SESSION['status'] !="login"){
    header("location:../index.php");

}; 
    
  $namauser = $_SESSION['username'];

    $result = $connection->query("SELECT nama FROM user WHERE username = '$namauser' "); 
    while($data = $result->fetch_assoc()) {         
          $nama = $data['nama'];
    }
?>
<!DOCTYPE html>
<head>
    <title>Edit Profil</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
    <nav class = "nav-primary" role = "navigation">
  <ul role = "menubar">
    <li role = "presentation"><a href = "index.php" role = "menuitem">Pilih Daerah</a></li>
    <li role = "presentation"><a href = "inputinfaq.php" role = "menuitem">Infaq</a></li>
    <li role = "presentation"><a href = "inputkhotib.php" role = "menuitem">Khotib</a></li>
    <li role = "presentation"><a href = "inputpengumuman.php" role = "menuitem">Pengumuman</a></li>
    <li role = "presentation"><a href = "jadwal.php" role = "menuitem" >Tampilkan Jadwal</a></li>
    <li role = "presentation"><a href = "edituser.php" role = "menuitem">Edit Profile</a></li>
    <li role = "presentation"><a href = "logout.php" role = "menuitem">Logout</a></li>
  </ul>
</nav>
<div class="mfs-list-table-container">
  <div class="mfs-list-table-search">
<p style="color: black">* username tidak bisa diubah, masukkan password baru jika ingin ganti atau masukkan password lama jika tidak.</p>
    <h1>Nama : <?php echo $nama;  ?></h1>
    <h1>Username : <?php echo $_SESSION['username'];  ?></h1>
        <form name="infaq" action="edituser.php" method="post" style="max-width:450px; margin:50px auto;">
            <input name="namabaru" type="text" class="f-input" placeholder="Masukkan nama baru">
            <input name="passwordbaru" type="password" class="f-input" placeholder="Masukkan password baru" required>
            <input type="hidden" name="username" value=<?php echo $_SESSION['username'];?>>
            <input id="namanyay-search-btn" type="submit" name="submit" value="Masukkan"/>
        </form>
    </div>
</div>
    <?php 
    include '../config.php';
    if(isset($_POST['submit'])){
        $namabaru = $_POST['namabaru'];
        $password = md5($_POST['passwordbaru']);
        $user = $_POST['username'];

        $cek = $connection->query("SELECT * FROM user WHERE username = '$user'");

            $result = $connection->query("UPDATE user SET nama = '$namabaru', password = '$password' WHERE username='$user'");

        header("location:index.php");
    }
    ?>
</body>
</html>