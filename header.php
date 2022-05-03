<!DOCTYPE html>
<html>
<head>
<title>ColitisSocial</title>
<link rel="stylesheet" type="text/css" href="includes/colitissocial.css" />
</head>
<body>
<div class="header">
    <a href="index.php"><img class="logo" src="images/logo_1.jpg" width="150"></a>
    </div>
    <div class="topnav">
        <a class="navlink" href="index.php">Home</a>
        <a class="navlink" href="profile.php">Profile</a>
        <a class="navlink" href="blog.php">Blog</a>
        <a class="navlink" href="doctors.php">Doctors</a>
        <a class="navlink" href="circles.php">Conversation Circles</a>
        
    
</div>
<?php
	
    
    if (isset($_SESSION['name']) && isset($_SESSION['surname'])) 
    { 
        echo "<p class=\"center\">Welcome, ".$_SESSION['name']." ".$_SESSION['surname'];
		echo " | <small><a href=\"signout.php\">Logout</a></small></p>";
	}
	?>

</body>