<!DOCTYPE html>
<html>
<head>
	<title>Masjid</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>Login Dismaweb</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<form action="execute.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" />
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
				<a href="http://localhost/Dismaweb/register.php">Register</a>
			</div>
		</form>
	</div>
</body>
 
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
 
</script>
</html>