<?php
session_start();
include_once 'includes/header.php';
?>

<title>ColitisSocial</title>

<?php
require_once 'includes/auth.php';
require_once 'includes/login.php';
echo "<h2 class=\"center\">Doctors In Our Network</h2>";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM `doctors`";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;

while ($row = $result->fetch_assoc()) {
    $did=$row["doctor_id"];
	echo "<ul class=\"centeredlist\"><li><a href=\"doctor.php?id=".$did."\">".$row["name"]."  ".$row["surname"]."</a></li></ul>";
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
</html>