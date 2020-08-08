<?php

include '../config.php';

session_start();
if($_SESSION['status'] !="login"){
    header("location:../index.php");

}
        
?>
<!DOCTYPE html>
<head>
    <title>Input Infaq</title>
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
    <li role = "presentation"><a href = "jadwal.php" role = "menuitem">Tampilkan Jadwal</a></li>
    <li role = "presentation"><a href = "edituser.php" role = "menuitem">Edit Profile</a></li>
    <li role = "presentation"><a href = "logout.php" role = "menuitem">Logout</a></li>
  </ul>
</nav>
<div class="mfs-list-table-container">
  <div class="mfs-list-table-search">
<p style="color: black">Pilihlah daerah terlebih dahulu agar tampilan jadwal dapat diakses</p>
    <h1>input Infaq</h1>
        <form name="infaq" action="inputinfaq.php" method="post" style="max-width:450px; margin:50px auto;">
            <input name="total" type="text" class="f-input" placeholder="Masukkan total infaq sekarang">
            <input type="hidden" name="username" value=<?php echo $_SESSION['username'];?>>
            <input id="namanyay-search-btn" type="submit" name="submit" value="Masukkan"/>
        </form>
</div>
</div>
    <?php 
    include '../config.php';
    if(isset($_POST['submit'])){
        $total = $_POST['total'];
        $user = $_POST['username'];

        $cek = $connection->query("SELECT * FROM infaq WHERE username = '$user'");
        $count = $cek->num_rows;
        if ($count > 0) {
            $result = $connection->query("UPDATE infaq SET total = '$total' WHERE username='$user'");
        } else {
            $result = $connection->query("INSERT INTO infaq(username,total) VALUES('$user','$total')");
        }
        header("location:inputkhotib.php");
    }
    ?>
</body>
</html>