<?php 
	// get values from the form on the login.php file

	$username = $_POST['user'];
	$password = $_POST['pass'];

	// to prevent my sql injection

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	// connect to the server and select database
	mysql_connect("localhost", "root", "");
	mysql_select_db("simple_login");

	//query the databse

	$result = mysql_query("select * from users where username = '$username' and password ='$password' ")
		or die("Failed to query databse " .mysql_error( ));
	$row = mysql_fetch_array($result);
		if ($row['username'] == $username && $row['password'] == $password) {
				echo "Login succesful!!! Welcome"; //.$row['$username'];
			} else {
				echo "Failed to login!!";
			}
				



 ?>