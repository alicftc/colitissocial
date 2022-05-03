<?php
require_once 'includes/login.php';
include_once 'includes/header.php';
?>
    <h1>ColitisSocial Sign-Up Form</h1>
    <p class="center">Welcome to ColitisSocial. Sign-Up and become a part of our community.</p>
<?php
if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['username'])) or (empty($_POST['fname'])) or (empty($_POST['lname'])) or (empty($_POST['email'])) or (empty($_POST['dtype'])) or (empty($_POST['diagnosisdate'])) or (empty($_POST['street']))or (empty($_POST['building'])) or (empty($_POST['doorno'])) or (empty($_POST['zipcode'])) or (empty($_POST['city'])) or (empty($_POST['state'])))  {
		$message = '<h3 class="errormessage">Please fill out all of the form fields!</h3>';
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
        $salt1 = "qm&h*";  
        $salt2 = "pg!@"; 
		$username = sanitizeMySQL($conn, $_POST['username']);
		$fname = sanitizeMySQL($conn, $_POST['fname']);			
		$lname = sanitizeMySQL($conn, $_POST['lname']);
		$email = sanitizeMySQL($conn, $_POST['email']);
		$password = sanitizeMySQL($conn, $_POST['password']);
        $token = hash('ripemd128', "$salt1$password$salt2");
        $dtype = sanitizeMySQL($conn, $_POST['dtype']);
        $diagnosisdate = sanitizeMySQL($conn, $_POST['diagnosisdate']);
        $diagnosisproof = sanitizeMySQL($conn, $_POST['diagnosisproof']);
        $profilepicture = sanitizeMySQL($conn, $_POST['profilepicture']);
        $street = sanitizeMySQL($conn, $_POST['street']);
        $building = sanitizeMySQL($conn, $_POST['building']);
        $doorno = sanitizeMySQL($conn, $_POST['doorno']);
        $zipcode = sanitizeMySQL($conn, $_POST['zipcode']);
        $city = sanitizeMySQL($conn, $_POST['city']);
        $state = sanitizeMySQL($conn, $_POST['state']);
		$query = "INSERT INTO users VALUES(NULL, \"$username\", \"$fname\", \"$lname\", \"$email\", \"$token\",\"$dtype\", \"$diagnosisdate\", NULL, NULL, \"$street\", \"$building\", \"$doorno\", \"$zipcode\", \"$city\", \"$state\" )";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$message = "<p style=\"text-aglin: center\" class=\"message\">You have succesfully signed up $fname!. <a href=\"signin.php\">You can Log in here</a></p>";
		}
	}
}
?>
<?php 
 
if (isset($message)) echo $message;
?>

<form class="signupform" method="post" action="">
   
    <div class="formrow">
        <label for="username">Select your username: </label>  
        <input type="text" name="username">
    </div>
    <div class="formrow">
        <div class="formcol">
            <label for="fname">Your name: </label>  
            <input type="text"  name="fname">
        </div>
        <div class="formcol">
            <label for="lname">Your last name: </label>  
            <input type="text" name="lname">
        </div>
    </div>
    <p class="formp">Enter your email address and select a password</p>
    <div class="formrow">
        <div class="formcol">
            <label for="email">Your email: </label>  
            <input type="text" name="email">
        </div>
        <div class="formcol">    
            <label for="password">Select your password: </label>  
            <input type="text"  name="password">
        </div>
    </div>
    <p class="formp">Enter your disease details</p>
    <div>
    <div class="formrow">
        <div class="formcol">
            <label for="dtype">Please select your disease type*:</label>
            <select name="dtype" size="1" >
                    <option value="Proctitis" selected>Proctitis</option>
                    <option value="Proctosigmoiditis">Proctosigmoiditis</option>
                    <option value="Distal colitis">Distal colitis</option>
                    <option value="Extensive colitis">Extensive colitis</option>
                    <option value="Pancolitis">Pancolitis</option>
                </select>
        </div>
   
        <div class="formcol">
            <label for="diagnosisdate">Diagnosis date:</label>
            <input type="date"  name="diagnosisdate">
        </div>
        <div class="formcol">
            <label for="diagnosisproof">Your diagnosis proof:</label>
            <input name="diagnosisproof" type="file" >
        </div>
    </div>
    <div class="formrow">
        <label for="profilepicture">Select a profile picture:</label>
        <input  name="profilepicture" type="file">
    </div>
    <p class="formp">Please enter your address information</p>
    <div class="formrow">
        <div class="formcol">
            <label for="street">Your street: </label>  
            <input type="text" name="street">
        </div>
        <div class="formcol">
            <label for="building">Your building: </label>  
            <input type="text"  name="building">
        </div>
        <div class="formcol">
            <label for="doorno">Your door number: </label>  
            <input type="text"  name="doorno">
        </div>
    
        <div class="formcol">
            <label for="zipcode">Your zip code: </label>  
            <input type="text"  name="zipcode">
        </div>
        <div class="formcol">
            <label for="city">Your city: </label>  
            <input type="text"  name="city">
        </div>
        <div class="formcol">
            <label for="state">Your state: </label>  
            <input type="text" name="state">
        </div>
    </div>
    <div style="margin-top: 10px; padding: 0px;" class="formrow">
    <input class="submit" type="submit" name="submit" value="Submit">
    </div>

</form>    

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