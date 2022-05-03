<?php
session_start()
?>
<!DOCTYPE html>
<head>
<title>Blog Entry</title>
<link rel="stylesheet" type="text/css" href="includes/colitissocial.css" /> 

</head>
<?php
require_once 'includes/auth.php';
require_once 'includes/login.php';
include_once 'includes/header.php';

if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['subject'])) || (empty($_POST['entry']))) {
		$message = '<p class="errormessage">Please fill out all of the form fields!</p>';
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$subject = sanitizeMySQL($conn, $_POST['subject']);
		$entry = sanitizeMySQL($conn, $_POST['entry']);
        $image= $_POST['image'];
        $uid=$_SESSION['user_id'];
		$query = "INSERT INTO blog_entries VALUES(NULL, \"$uid\", \"$subject\", \"$entry\", \"$image\")";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$message = "<p class=\"message\">Successfully added your blog entry! <a href=\"index.php\">Return to home page</a></p>";
		}
	}
}
?>

<?php  
if (isset($message)) echo $message;
?>
<body>
<h1>Create a Blog Entry</h1>
  <form method="post" action="">
    <div class="formrow">
      <div class="formcol">
        <label for="image">Image</label>
        <input type="file" name="image">
      </div>
      <div class="formcol">
        <label for="subject">Subject</label>
        <input type="text" name="subject">
      </div>
    </div>
    <div class="formrow">
      <label for="entry">Entry</label>  
      <textarea name="entry" rows="10" cols="80">
      </textarea>
    </div>
    <div style="margin-top: 10px; padding: 0px;" class="formrow">
      <input class="submit" type="submit" name="submit" value="Post">
    </div>
  </form>
</body>

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

</html>