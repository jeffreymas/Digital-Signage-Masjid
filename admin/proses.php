<?php
// include database connection file
include '../config.php';
session_start();
if($_SESSION['status'] !="login"){
    header("location:../index.php");

};
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['tampil']))
{   
	$user = $_SESSION['username'];
    $id = $_POST['id'];
    $username=$_POST['username'];

    // update user data
    $cek = $connection->query("SELECT * FROM jadwal WHERE username = '$user'");
    $count = $cek->num_rows;
    if ($count > 0) {
    	$result = $connection->query("UPDATE jadwal SET id_kabkot = '$id' WHERE username='$username'");
    	if ($result) {
    		header("location:inputinfaq.php");
		} else {
			echo "gagal";
		}
    } else {
    	$result = $connection->query("INSERT INTO jadwal(username,id_kabkot) VALUES('$username','$id')");
    	if ($result) {
    		header("location:inputinfaq.php");
		} else {
			echo "gagal";
		}
    }
    // Redirect to homepage to display updated user in list
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = $connection->query("SELECT * FROM kabkot WHERE id_kabkot=$id");

while($data = $result->fetch_assoc())
{
    $kabkot = $data['nama_kabkot'];
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];
}
?>
<html>
<head>  
    <title>Pilih Daerah</title>
    <link rel="stylesheet" type="text/css" href="../css/proses.css">
</head>

<body>

    <form name="proses" method="post" action="proses.php">
        <table border="0">
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="hidden" name="username" value=<?php echo $_SESSION['username'];?>></td>

                <td><input type="submit" name="tampil" value="Tampilkan"></td>
            </tr>
        </table>
    </form>
</body>
</html>