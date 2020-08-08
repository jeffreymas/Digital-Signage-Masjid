
<?php 
include 'config.php';
if(isset($_POST['register'])){
$name = $_POST['name'];
$username = $_POST['username'];
$password = md5($_POST['password']);
 
$daftar = $connection->query("select * from user where username='$username'");
$cek = $daftar->num_rows;
 
if($cek > 0){
	echo "<h1>Username sudah ada</h1>";
}else{
	$insert = $connection->query("INSERT INTO user(nama,username,password) VALUES('$name','$username','$password')");
	header("location:index.php");
}
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dismaweb</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>Register Dismaweb</h2></center>	
	<div class="login">
		<form action="register.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Name:</label>
				<input type="text" name="name" id="name" />
			</div>
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" />
			</div>			
			<div>
				<input type="submit" name="register" value="Register" class="tombol">
			</div>
		</form>
	</div>
</body>
 
<script type="text/javascript">
	function validasi() {
		var name = document.getElementById("name").value;
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if ((username != "" && password!="") && name != "") {
			return true;
		}else{
			alert('Nama, Username dan Password harus di isi !');
			return false;
		}
	}
 
</script>
</html>