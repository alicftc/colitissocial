<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<title>Profilem</title>
<link rel="stylesheet" type="text/css" href="includes/colitissocial.css" />
</head>
<body>
<?php
require_once 'includes/auth.php';
require_once 'includes/login.php';
include_once 'includes/header.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

//Basic profile information
if (isset($_SESSION['user_id'])) {
	$uid = sanitizeMySQL($conn, $_SESSION['user_id']);
	$query1 = "SELECT * FROM users WHERE user_id=".$uid;
	$result1 = $conn->query($query1);
	if (!$result1) die ("Invalid user id.");
	$rows = $result1->num_rows;
	if ($rows == 0) {
		echo "No user found with id of $id<br>";
	} else {
		while ($row = $result1->fetch_assoc()) {
			echo "<h1> ".$row['name']." ".$row['surname']."'s Profile</h1>";
			echo "<p style=\"font-size:small;\"class=\"center\">Username @".$row['username']."</p>";
			echo "<div class=\"profile\"><p>You were diagnosed with ".$row['disease_type']." on ".$row['diagnosis_date']."</p>";	
			echo "<p class=\"center\"> Your information in the system: </p>";
			echo "<table class=\"doctorstable\">";
			echo "<tr><td class=\"doctorstdh\">Email Address: </td>";
			echo "<td class=\"doctorstd\">"	.$row['login_email']."</td></tr>";
			echo "<tr><td class=\"doctorstdh\">Address: </td>";
			echo "<td class=\"doctorstd\">".$row['building']." ".$row['street']." ".$row['door_number'].", ".$row['zip_code']." ".$row['city'].", ".$row['state']."</td></tr></table>";
		}
		echo "</div>";}
} else {
	echo "No user id passed ";
}
?>

<?php
//Doctors
if (isset($_SESSION['user_id'])) {
	$uid = sanitizeMySQL($conn, $_SESSION['user_id']);
	$query2 = "SELECT users.name AS un, users.surname AS us, doctors.name AS dn, doctors.surname AS ds, doctors.doctor_id AS di FROM `users` JOIN patient_doctor ON users.user_id=patient_doctor.user_id JOIN doctors ON patient_doctor.doctor_id=doctors.doctor_id WHERE users.user_id=".$uid;
	$result2 = $conn->query($query2);
	if (!$result2) die ("Invalid user id.");
	$rows = $result2->num_rows;
	if ($rows == 0) {
		echo "<p class=\"profile\" >This user has not shared their <b>doctors</b> yet</p>";
	} else {
		echo "<div class=\"profile\"><h3> You are currently treated by: </h3>";
		while ($row = $result2->fetch_assoc()) {
			echo "<ul><li><a href=\"conversationcirlce.php?id=".$row['di']."\"> Dr. ".$row["dn"]." ".$row["ds"]."</a></li></ul>";
			
		}
		echo "</div>";}
} else {
	echo "No user id passed ";
}
?>

<?php
//Conversation Circles
if (isset($_SESSION['user_id'])) {
	$uid = sanitizeMySQL($conn, $_SESSION['user_id']);
	$query3 = "SELECT users.name AS un, conversation_circles.name AS cn, conversation_circles.circle_id AS ci FROM users JOIN circle_participants ON users.user_id=circle_participants.user_id JOIN conversation_circles ON circle_participants.circle_id=conversation_circles.circle_id WHERE users.user_id=".$uid;
	$result3 = $conn->query($query3);
	if (!$result3) die ("Invalid user id.");
	$rows = $result3->num_rows;
	if ($rows == 0) {
		echo "<p class=\"profile\" >This user has not shared their <b>conversation circles</b> information yet</p>";
	} else {
		echo "<div class=\"profile\"><h3> Attended conversation circles </h3>";
		while ($row = $result3->fetch_assoc()) {
			echo "<ul><li><a href=\"conversationcirlce.php?id=".$row['ci']."\">".$row["cn"]."</a></li></ul>";		
		}
		echo "</div>";}
} else {
	echo "No user id passed ";
}
?>

<?php
if (isset($_SESSION['user_id'])) {
	$uid = sanitizeMySQL($conn, $_SESSION['user_id']);
	$query4 = "SELECT users.name AS un, users.surname AS us, drugs.drug_name AS dn, drugs.drug_link AS dl, drugs.drug_id AS di  FROM `users` JOIN drug_use ON users.user_id=drug_use.user_id JOIN drugs ON drug_use.drug_id=drugs.drug_id WHERE users.user_id=".$uid;
	$result4 = $conn->query($query4);
	if (!$result4) die ("Invalid user id.");
	$rows = $result4->num_rows;

	if ($rows == 0) {
		echo "<p class=\"profile\" >This user has not shared their <b>medicine plan</b> yet</p>";
	} else {
		echo "<div class=\"profile\"><h3> Your current medicine plan </h3>";
		while ($row = $result4->fetch_assoc()) {
			echo "<ul><li><a href=\"drug.php?id=".$row['di']."\">".$row["dn"]."</a></li></ul>";		
		}
	echo "</div>";}
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
    