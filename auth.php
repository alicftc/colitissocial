<?php
# Check if we do NOT have a logged-in user
if (!isset($_SESSION['name']) || !isset($_SESSION['surname']) ) {
	# Set a session variable with the current file so we know 
	# where to return to after login
	$_SESSION['goto'] = basename($_SERVER['PHP_SELF']);
	if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
		$_SESSION['goto'] .= '?'.$_SERVER['QUERY_STRING'];	
	}
	# Redirect to login page
	header("Location: signin.php");
}
?>