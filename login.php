<?php
require("functions.php");

	if(isset ($_SESSION["userId"])) {
		header("Location: movies.php");
		exit();
	}

$signupEmailError="";
$signupEmail = "";

if(isset($_POST["signupEmail"])) {
		
		if (empty ($_POST["signupEmail"])) {
			
	
			$signupEmailError = "you have to enter your email";
		} else {
	
			$signupEmail = $_POST["signupEmail"];
		}
	}
$signupPasswordError = "";
$signupPasswordConfirmError = "";

if(isset($_POST["signupPassword"])) {

	if (empty ($_POST["signupPassword"])) {

		$signupPasswordError = "you have to choose a password";
		
	} else {

	
	if (strlen ($_POST["signupPassword"]) < 8 ) {
		
		$signupPasswordError = "password must be at least 8 characters long";
		}
	}
	
	//lilith
	if ($_POST["signupPassword"] != $_POST["signupPasswordConfirm"]){
		$signupPasswordConfirmError = "password has to match";
		
	}
		
}
if( isset($_POST["signupEmail"]) &&
	isset($_POST["signupPassword"]) &&
	$signupEmailError == "" &&
	empty($signupPasswordError)
	){
	
	echo "saving...<br>";
	echo "email " .$signupEmail."<br>";
	echo "parool ".$_POST["signupPassword"]."<br>";
	
	$password = hash("sha512", $_POST["signupPassword"]);
	
	echo "hash ".$password. "<br>";
	
	signup($signupEmail, $password);
	
}

$notice = "";
if (  isset($_POST["loginEmail"]) &&
	  isset($_POST["loginPassword"]) &&
	  !empty($_POST["loginEmail"]) &&
	  !empty($_POST["loginPassword"])
	) {
		 $notice = login($_POST["loginEmail"], $_POST["loginPassword"]);
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login page</title>
	</head>
				
	<body>
	<h1>Sign up</h1>
		
		<form method="POST">
			
			<input placeholder="email" name="signupEmail" type="email"  value="<?php echo $signupEmail; ?>" > <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input placeholder="password" name="signupPassword" type="password">
			
			<input placeholder="confirm your password" name="signupPasswordConfirm" type="password">
			
			<br><br>
			
			<?php echo $signupPasswordError; ?>
			<?php echo $signupPasswordConfirmError; ?>
			<br><br>
		<input type="submit" value="sign up">

	<h1>Log in</h1>
		
		<p style="color:red;"><?php echo $notice; ?></p>
		<form method="POST">
			<input placeholder="username" name="loginEmail" type="text" value="<?php echo $_POST['loginEmail']; ?>">
			
			<br><br>
			
			<input placeholder="password" name="loginPassword" type="password">
			
			<br><br>
			
			<input type="submit" value="Log in">
			
		
		</form>
	