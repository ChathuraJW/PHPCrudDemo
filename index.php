<?php
	//	import database class
	require_once('assets/Database.php');
	//	check the connection
	$isConnected = Database::connect();
	if ($isConnected) {
		echo("<div class='banner green'>Connected</div>");
	} else {
		echo("<div class='banner red'>Disconnected</div>");
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple CRUD Demonstration</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<div style="text-align: center;"><h1>CRUD Operation</h1></div>
<br>
<iframe src="insertUser.php" class="frame" frameborder="1"></iframe>
<iframe src="listUsers.php" class="frame" frameborder="1"></iframe>
<iframe src="editUser.php" class="frame" frameborder="1"></iframe>
<iframe src="deleteUser.php" class="frame" frameborder="1"></iframe>

<div class="footer">
    <span>Simple CRUD Demonstration</span>
</div>
</body>
</html>


