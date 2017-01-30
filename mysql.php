<?php
//database information
require("mysqlinfo.php");

//read the URL and set the fields
//echo "made it to mysql php";
$emailo = isset($_GET['email']) ? $_GET['email'] : 'John';
$userpswd = isset($_GET['pword']) ? $_GET['pword'] : 'secret';
$requestType = isset($_GET['requestType']) ? $_GET['requestType'] : 'no way';
$latitude = isset($_GET['lat']) ? $_GET['lat'] : '';
$longitude = isset($_GET['lng']) ? $_GET['lng'] : '';

//echo $requestType;
//echo $latitude;
//echo $longitude;

// Opens a connection to a MySQL server and sets the active MySQL database
$connection=mysqli_connect ("localhost", $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

if (!$database) {
  die ('Can\'t use db : ' . mysql_error());
}
//need to add a switch statement here to know what type of call to make

// Insert new row with user data
if ($requestType === 'register')
{
	$query = sprintf("INSERT INTO `login` " .
			 "(id, email, password)" .
			 " VALUES (NULL,'%s', '%s');",
			 mysqli_real_escape_string($connection, $emailo),
			 mysqli_real_escape_string($connection, $userpswd)); 

	//Send query to the database
	//echo ('i am registering.');
	if ($connection->query($query) === TRUE) {
		echo 1;
	} 
	
	else {
		echo 0;
		/*$errnumb = $connection->errno;
		if ($errnumb = 1062) 
		{
			echo "User Email already exists. ";
		}
		else 
		{
			echo "Database error occured.  Please try again. ";
		}*/
	}
}

else if ($requestType === 'login')
{	
	// Get the login credentials from user
	
	//    $emailo = $_POST['email'];
	//    $userpswd = $_POST['pword'];
		

    // Check the users input against the DB.

    $query = sprintf("SELECT email, password FROM `login`" .
			 "WHERE email = '%s' AND password = '%s'",
			 mysqli_real_escape_string($connection, $emailo),
			 mysqli_real_escape_string($connection, $userpswd));
	
	//$connection -> query ($query);	
	if ($result = $connection -> query($query)) {
		$rows = $result->num_rows;
		echo $rows;
		$rows = 0;
		$result->close();
	}
}
else {
	echo ("something did not work");
}
	
mysqli_close($connection);
?>