<?php
session_start();
include_once 'includes/header.php';
?>

<title>ColitisSocial</title>

<?php
require_once 'includes/auth.php';
require_once 'includes/login.php';
include_once 'includes/search.php';
echo "<h2 class=\"center\">Recent Blog Posts</h2>";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM `users` NATURAL JOIN blog_entries ORDER BY entry_id DESC ";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;

while ($row = $result->fetch_assoc()) {
    $uid=$row["user_id"];
	echo "<table class=\"profiletable\">";
	echo "<tr>";
    echo "<tr><td class=\"blogsubject\" >".$row["subject"]."</td>";
	echo '</tr>';
    echo "<tr>";
	echo "<td class=\"blogentry\">".$row["entry"]."</td>";
	echo '</tr>';
	echo "<tr><td class=\"meta\"><a href=\"profileuser.php?id=".$uid."\">".$row["name"]."  ".$row["surname"]."</a></td></tr>"; 
    echo "</table><br><br>";
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