<?php

	class Database {
//		describe basic parameters of mysql server
//		change those parameters accordingly
		private static string $server = "localhost";
		private static string $database = "php_crud_demo";
		private static string $userName = "root";
		private static string $password = "";

//		connection establishment function

		public static function executeQuery($sqlQuery): bool|mysqli_result {
			try {
				$connection = self::connect();
				$result = $connection->query($sqlQuery);
				//check weather query success
				if ($result) {
					return $result;
				} else {
					throw new mysqli_sql_exception("Query Failed.");
				}
			} catch (Exception $exception) {
				echo("Exception ::: << " . $exception->getMessage() . " >>  " . $exception->getTraceAsString());
				return false;
			}
		}

		public static function connect(): mysqli|bool {
			$conn = new mysqli(self::$server, self::$userName, self::$password, self::$database);
			if ($conn->connect_errno) {
				#echo("Exception ::: << " . $conn->connect_error . " >>");
				return false;
			}
			return $conn;
		}

	}
