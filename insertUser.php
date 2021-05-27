<?php
	//    import database class
	require_once('assets/Database.php');
	//	check whether data is posted
	if (isset($_POST['submitData'])) {
//		assign posted data to variables
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$degree = $_POST['degree'];

//		data insertion query
		$sqlQuery = "INSERT INTO user_info(first_name, last_name, degree) VALUES ('$firstName','$lastName','$degree');";
//		execute created query
		$result = Database::executeQuery($sqlQuery);
//		confirmation section
		if ($result)
			echo("<script>alert('Registration Successful.')</script>");
		else
			echo("<script>alert('Registration Failed.')</script>");
	}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert New User</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<h1>New User Registration</h1>
<!--	create from to collect user data-->
<form method="post" action="" class="userRegistration">
    <label for="firstName">First Name</label><br>
    <input type="text" name="firstName" id="firstName" required><br>
    <br>
    <label for="lastName">Last Name</label><br>
    <input type="text" name="lastName" id="lastName" required>
    <br><br>
    <select name="degree">
        <option value="CS" selected>Computer Science</option>
        <option value="IS">Information Systems</option>
    </select>
    <br><br>
    <button type="submit" name="submitData">Submit</button>
    <button type="reset">Clean</button>
</form>
</body>
</html>
