<?php

session_start();

error_reporting(0);

// $_SESSION["user_id"] = "admin";
$userprofile = $_SESSION["user_id"];

include('connection.php');


if ($userprofile == true) {

	$sql = "SELECT userid, name, coverpic, profilepic, follower, following FROM login WHERE userid = ?";

	// Prepared Statement
	$singleResult = mysqli_prepare($conn, $sql);

	// Bind parameter
	mysqli_stmt_bind_param($singleResult, 's', $userprofile);

	// Bind result in variables
	mysqli_stmt_bind_result($singleResult, $user_id, $user_name, $coverpic, $profilepic, $follower, $following);

	// Execute prepared statement
	mysqli_stmt_execute($singleResult);

	// Fetch data
	mysqli_stmt_fetch($singleResult);

	echo "<h2 class='bg-secondary text-light px-2'>"."Welcome ".$user_name."! </h2>";
} else {
	header("location:login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<mata charset="UTF-8">
	<title>Twitter-Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keyword" content="twitter, twitter home">
	<meta name="author" content="Bhagabati Prasad">
	<meta name="theme-color" content="#222">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<section class="profile-sec bg-white">
		<div style="background: #dfe4ea;">
			<div class="coverpic" style="background: <?= "url($coverpic);";?> no-repeat; width:100%;">
			</div><!-- Cover pic end -->
			<!-- Profile pic and edit btn start -->
			<div class="d-flex justify-content-between profilepic-editbtn">
				<!-- Profile pic -->
				<div class="profilepic">
					<img src="<?=$profilepic;?>" class="mypic rounded-circle">
				</div>
				<!-- Edit button -->
				<button class="edit-btn">Edit Profile</button>
			</div>
			<!-- Profile pic and edit btn end -->
			<!-- About start -->
			<div class="about">
				<p class="myname"><?=$user_name;?></p>
				<p class="myid">@<?=$user_id;?></p>
				<p class="bio">I'm Creative and Passionate web developer.</p>
				<div class="py-3">
					<a href="#" class="mr-4">
						<strong><?=$following;?></strong> Following
					</a>
					<a href="#">
						<strong><?=$follower;?></strong> Followers
					</a>
				</div>
			</div>
			<!-- About end -->
		</div>
		<!-- log out button -->
		<a href="logout.php" class="btn btn-dark">Logout</a>
	</section>
</body>
</html>

