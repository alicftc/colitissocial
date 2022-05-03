<?php
session_start();
$_SESSION = array();
session_destroy();
include_once 'includes/header.php';
echo "<h2 style=\"padding-top:30px;\"class=\"center\">You are now logged out.</h2>";
echo "<h2 class=\"center\"><a  href=\"signin.php\">Log in again</a></h2>";
?>