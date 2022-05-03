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
	// Grab the id, sanitize it, and use it to query the db just for
	// that pet alone 
	$id = sanitizeMySQL($conn, $_GET['id']);
	// Note the WHERE pet_id=".$id; will allow us to flexibly use
	// this template page to show any pet's info 
	$query1 = "SELECT * FROM `conversation_circles` WHERE circle_id=". $id;
    //$query2 = "SELECT `drugs.drug_name` FROM `drugs` JOIN `drug_use` ON `drugs.drug_id=drug_use.drug_id` WHERE `drug_use.user_id`=".$id; 
	$result1 = $conn->query($query1);
	if (!$result1) die ("Invalid circle id.");
	$rows = $result1->num_rows;
	// Print the pet's info or show the user an error 
	if ($rows == 0) {
		echo "No circle found with id of $id<br>";
	} else {
		while ($row = $result1->fetch_assoc()) {
			echo "<h1>".$row['name']."</h1>";
			echo "<h3 class=\"center\">Information about the Converstion Circle</h3>";	
			echo "<table class=\"doctorstable\"><tr><td class=\"doctorstdh\">Phone Number: </td>";
			echo "<td class=\"doctorstd\">"	.$row['phone_number']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Email Address: </td>";
			echo "<td class=\"doctorstd\">"	.$row['email_address']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Meeting Days and Time: </td>";
			echo "<td class=\"doctorstd\">"	.$row['meeting_day']." at ".$row['meeting_time']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Seat Capacity: </td>";
			echo "<td class=\"doctorstd\">"	.$row['seat_capacity']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Address: </td>";
			echo "<td class=\"doctorstd\">".$row['building']." ".$row['street']." ".$row['door_number'].", ".$row['zip_code']." ".$row['city'].", ".$row['state']."</td></tr></table>";
		}
	}
} else {
	echo "No circle id passed ";
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
    