<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<title>ColitisSocial Sign-Up Form</title>
<link rel="stylesheet" type="text/css" href="includes/colitissocial.css" />
</head>
<?php
require_once 'includes/login.php';
include_once 'includes/header.php';
?>

<?php
if (isset($_POST['submit'])) { //check if the form has been submitted
	if ( empty($_POST['email']) || empty($_POST['password']) ) {
		$message = '<p style="text-align:center;"class="errormessage">Please fill out all of the form fields!</p>';
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$email = sanitizeMySQL($conn, $_POST['email']);
		$password = sanitizeMySQL($conn, $_POST['password']);			
		$salt1 = "qm&h*";  
		$salt2 = "pg!@";  
		$password = hash('ripemd128', $salt1.$password.$salt2);
		$query  = "SELECT * FROM `users` WHERE login_email='$email' AND login_password='$password'"; 
		$result = $conn->query($query);    
		if (!$result) die($conn->error); 
		$rows = $result->num_rows;
		if ($rows==1) {
			$row = $result->fetch_assoc();
			$_SESSION['name'] = $row['name'];
			$_SESSION['surname'] = $row['surname'];
			$_SESSION['user_id'] = $row['user_id'];
			$goto = empty($_SESSION['goto']) ? 'index.php' : $_SESSION['goto'];			
			header('Location: ' . $goto);
			exit;			
		} else {
			$message = '<h2 style="text-align:center;" class="errormessage">Invalid username/password combination!</h2>';
		}
	}
}
?>

<?php  
if (isset($message)) echo $message;
?>

<form style="width:50%; margin: auto;" method="POST" action="">
<div class="formrow">
	<label for="email">Email</label>
	<input type="text" name="email" size="40">
	<label for="password">Password:</label>
	<input type="password" name="password" size="40">
</div>
<div style="margin-top: 10px; padding: 0px;" class="formrow">
	<input class="submit" type="submit" name="submit" value="signin">
</div>
</form>

<p style="text-align:center;">Don't have an account? <a href="sign_up.php">Create one here</a>



<?php
function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}
?>