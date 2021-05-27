<?php
	//	import database,User class
	require_once('assets/Database.php');
	require_once('assets/User.php');

	if (isset($_GET['search'])) {
//		assign search key to a variable
		$userID = $_GET['userID'];
		//call sql query for retrieve searched user data
		$sqlQuery = "SELECT * FROM user_info WHERE user_id=$userID LIMIT 1";
//    call static executeQuery function
		$searchResult = Database::executeQuery($sqlQuery);
		if ($searchResult->num_rows) {
//		    create user object and assign searched user value for it
			$searchedUser = new User();
			foreach ($searchResult as $resultArray) {
				$searchedUser->createUser($resultArray['user_id'], $resultArray['first_name'], $resultArray['last_name'], $resultArray['degree']);
			}
		} else {
			echo("<script>alert('Invalid User ID.')</script>");
		}
	}
	if (isset($_GET['action'])) {
//		assign posted data to variables
		$userID = $_GET['userID'];

//		create sql query and run it
		$sqlQuery = "DELETE FROM user_info WHERE user_id=$userID";
		$updateQueryResult = Database::executeQuery($sqlQuery);

//		execution status report
		if ($updateQueryResult) {
			echo("<script>alert('User Information Deleted');</script>");
		} else {
			echo("<script>alert('Operation Failed.')</script>");
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
	if (isset($searchedUser)) {
		?>
        <h2>User Information</h2>
        <table class="userList">
            <tr>
                <th>Student Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Degree</th>
            </tr>
            <tr>
                <td><?php echo($searchedUser->getUserID()); ?></td>
                <td><?php echo($searchedUser->getFirstName()); ?></td>
                <td><?php echo($searchedUser->getLastName()); ?></td>
                <td><?php echo($searchedUser->getDegree()); ?></td>
            </tr>
        </table>
        <br><br>
        <!--		a tag as a button-->
        <div style="text-align: center;">
            <a href="?action=delete&userID= <?php echo($searchedUser->getUserID()); ?>" class="linkToButton">Delete</a>
        </div>
	<?php } ?>

</body>
</html>
