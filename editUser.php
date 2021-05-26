<?php
//    import database,User class
	require_once('assets/Database.php');
	require_once('assets/User.php');

	if(isset($_GET['search'])){
//		assign search key to a variable
		$userID=$_GET['userID'];
		//call sql query for retrieve searched user data
		$sqlQuery="SELECT * FROM user_info WHERE user_id=$userID LIMIT 1";
//    call static executeQuery function
		$searchResult=Database::executeQuery($sqlQuery);
		if($searchResult->num_rows){
//		    create user object and assign searched user value for it
			$searchedUser=new User();
			foreach ($searchResult as $resultArray){
				$searchedUser->createUser($resultArray['user_id'],$resultArray['first_name'],$resultArray['last_name'],$resultArray['degree']);
			}
        }else{
		    echo("<script>alert('Invalid User ID.')</script>");
        }
	}
	if(isset($_POST['saveEdit'])){
//		assign posted data to variables
        $userID=$_POST['userID'];
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$degree=$_POST['degree'];

//		create sql query and run it
		$sqlQuery="UPDATE user_info SET first_name='$firstName' , last_name='$lastName' , degree='$degree' WHERE user_id=$userID";
		$updateQueryResult=Database::executeQuery($sqlQuery);

//		execution status report
        if($updateQueryResult){
	        echo("<script>alert('Update Completed.');</script>");
        }else{
	        echo("<script>alert('Update Incomplete.')</script>");
        }
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit User Info</title>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<h1>Search for User</h1>
	<form action="" method="get" class="searchUser">
		<input type="number" placeholder="User ID" name="userID" required>
		<button type="submit" name="search">Search</button>
	</form>

<!--    within html php styles-->
	<?php
		if(isset($searchedUser)){
	?>
	<div class="editableSection">
		<h1>Edit User Info</h1>
		<form method="post" action="" class="userRegistration">
			<label for="userID">User ID</label><br>
			<input type="number" name="userID" id="userID" value="<?php echo($searchedUser->getUserID()); ?>" required readonly><br>
			<br>
			<label for="firstName">First Name</label><br>
			<input type="text" name="firstName" id="firstName" value="<?php echo($searchedUser->getFirstName()); ?>" required><br>
			<br>
			<label for="lastName">Last Name</label><br>
			<input type="text" name="lastName" id="lastName" value="<?php echo($searchedUser->getLastName()); ?>" required>
			<br><br>
			<select name="degree">
				<option value="CS" <?php echo $searchedUser->isCS() ? "selected":""; ?> >Computer Science</option>
				<option value="IS" <?php echo !$searchedUser->isCS() ? "selected":""; ?> >Information Systems</option>
			</select>
			<br><br>
			<button type="submit" name="saveEdit">Save</button>
		</form>
	</div>
	<?php } ?>

</body>
</html>
