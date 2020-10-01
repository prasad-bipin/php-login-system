<?php

session_start();
include('connection.php');
$msg = "";


if (isset($_POST["login"])) {
	 if (empty($_POST["username"]) || empty($_POST["password"])) {
	 	$msg = "All fields are required.";
	 } else {

	 	$sql = "SELECT * FROM login WHERE userid = ? AND password = ?";

	 	$result = mysqli_prepare($conn, $sql);

	 	mysqli_stmt_bind_param($result, 'si', $userid, $pwd);

	 	$userid = $_POST["username"];
	 	$pwd = $_POST["password"];

	 	mysqli_stmt_execute($result);
	 	mysqli_stmt_store_result($result);

	 	$status = mysqli_stmt_num_rows($result);

	 	if ($status == 1) {
	 		
	 		$_SESSION["user_id"] = $userid;
	 		header("location:index.php");
	 	} else {
	 		$msg = "Login Failed! Incorrect username or password.";
	 	}
	 }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style type="text/css">
		form {
			width: 500px;
		}
	</style>
</head>
<body>
	<div class="container py-5">
		<form action="" method="post">
			<label>Username: </label><br>
		 	<input type="text" name="username" class="w-100">
		 	<br><br>
		 	<label>Password: </label><br>
		 	<input type="text" name="password" class="w-100">
		 	<br><br>
		 	<button type="submit" name="login">Login</button><br><br>
		 	<?php echo $msg;?>
		</form>

	</div>
</body>
</html>
