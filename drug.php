<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="includes/colitissocial.css" />
</head>
<body>
<?php
require_once 'includes/auth.php';
require_once 'includes/login.php';
include_once 'includes/header.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['id'])) {
	
	$id = sanitizeMySQL($conn, $_GET['id']);

	$query1 = "SELECT * FROM `drugs` WHERE drug_id=". $id;

	$result1 = $conn->query($query1);
	if (!$result1) die ("Invalid drug id.");
	$rows = $result1->num_rows;

	if ($rows == 0) {
		echo "No user found with id of $id<br>";
	} else {
		while ($row = $result1->fetch_assoc()) {
			echo '<h1>'.$row['drug_name']."</h1>";
			echo "<p class=\"center\">".$row['drug_name']." is a ".$row["drug_type"]." type of drug</p>";
			echo "<p class=\"center\"> Find more information on this drug <a href=\"".$row['drug_link']."\">here</a></p>";		
		}
	}
} else {
	echo "No user id passed ";
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
</body>
<html>
    