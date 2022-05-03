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
	$query1 = "SELECT * FROM `doctors` WHERE doctor_id=". $id;
	$result1 = $conn->query($query1);
	if (!$result1) die ("Invalid doctor id.");
	$rows = $result1->num_rows;
	if ($rows == 0) {
		echo "No doctor found with id of $id<br>";
	} else {
		while ($row = $result1->fetch_assoc()) {
			echo "<h1> Dr. ".$row['name']." ".$row['surname']."</h1>";
			echo "<p class=\"center\">Dr. ".$row['surname']." specializes in ".$row["speciality"]."</p>";
			echo "<h3 class=\"center\">Information about the Doctor</h3>";	
			echo "<table class=\"doctorstable\"><tr><td class=\"doctorstdh\">Phone Number: </td>";
			echo "<td class=\"doctorstd\">"	.$row['phone_number']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Email Address: </td>";
			echo "<td class=\"doctorstd\">"	.$row['email_address']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Address: </td>";
			echo "<td class=\"doctorstd\">".$row['building']." ".$row['street']." ".$row['door_number'].", ".$row['zip_code']." ".$row['city'].", ".$row['state']."</td></tr></table>";
		}
	}
} else {
	echo "No doctor id passed ";
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
    