<?php
//database information
require("mysqlinfo.php");

//read the URL and set the fields
$emailo = isset($_GET['email']) ? $_GET['email'] : 'John';
echo "email is $emailo";

// Opens a connection to a MySQL server and sets the active MySQL database
$connection=mysqli_connect ("localhost", $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

if (!$database) {
  die ('Can\'t use db : ' . mysql_error());
}

// Insert new row with user data

$query = sprintf("INSERT INTO `users` " .
		 "(id, email)" .
		 " VALUES (NULL,'%s');",
		 mysqli_real_escape_string($connection, $emailo));
		 
//Send query to the database

if (!$connection->query($query) === TRUE) {
	echo 1;
} 
	
mysqli_close($connection);
?>