<?php
session_start();
include_once 'includes/header.php';
?>


<?php
require_once 'includes/auth.php';
require_once 'includes/login.php';
if (isset($_GET['submit'])) { //check if the form has been submitted
	if (empty($_GET['search'])) {
		echo "<p>Please fill out all of the form fields!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$name = sanitizeMySQL($conn, $_GET['search']);
		$query = "SELECT user_id, name, surname FROM users WHERE name LIKE '%$name%' OR surname LIKE '%$name%'";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$rows = $result->num_rows;
			if ($rows) {
				echo "<h1>Results</h1>";
				while ($row = $result->fetch_assoc()) {
                    $uid=$row["user_id"];   
	
					echo "<p class=\"center\"><a href=\"profileuser.php?id=".$uid."\" >".$row['name']."  ".$row["surname"]."</a></p>";
		
				}
				
			} else {
				echo "<p>No results!</p>";
			}
			echo "<p style=\"font-weight:bold\" class=\"center\"><a href=\"index.php\">Search Again</a></p>";
		}
	}
}
?>

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
