<?php
require_once('assets/Database.php');

$sqlQuery="SELECT * FROM user_info";
$result=Database::executeQuery($sqlQuery);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>List All Users</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>All Users</h1>

    <table border="1" class="userList">
        <tr>
            <th>Student Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Degree</th>
        </tr>
	        <?php
		        foreach ($result as $resultLine){

			        echo(
				        "<tr>".
				        "<td>".$resultLine['user_id']."</td>".
				        "<td>".$resultLine['first_name']."</td>".
				        "<td>".$resultLine['last_name']."</td>".
				        "<td>".$resultLine['degree']."</td>".
				        "</tr>"
			        );
		        }
	        ?>
    </table>
</body>
</html>
