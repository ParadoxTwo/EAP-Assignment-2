<?php
session_start(); 
$error=''; 
if (isset($_POST['submit'])) {
	if (empty($_POST['username'])) {
		$error = "Username is not entered";
	}else if(empty($_POST['password'])){
		$error = "Password is not entered";
	}else if(isset($_POST['txtCaptcha']) and $_POST['txtCaptcha'] !=''){
		if($_SESSION['captcha_text'] == $_POST['txtCaptcha']){
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			require_once('databaseConnection.php');
			$query = "SELECT * FROM edwin_login where username='$username'";
			$stmt = OCIParse($connect, $query);
			if(!$stmt) {
				echo "An error occurred in parsing the SQL string.\n";
				exit;
			}
			OCIExecute($stmt);
			$valid=false;	
			while(OCIFetch($stmt)){					
				if(OCIResult($stmt,"USERNAME")==$username){
					if(password_verify($password,OCIResult($stmt,"PASSWORD"))){
						$valid=true;
						$_SESSION['priv'] = OCIResult($stmt,4);
					}
				}
			}
			If($valid){
				$_SESSION['user'] = $_REQUEST["username"];
				header("location: home.php");		
			}else{
				$error = "Username or Password is invalid";
			}
			OCILogOff($connect);
		}else{
			$error = "Sorry Incorrect captcha entered";
		}
	}else{
		$error = "You have not entered captcha";
	}
}
?>
<html>
	<head>
		<title>Login</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<h1 align="center">SIT780 Assignment 2</h1>
		<h2 align="center">Login</h2>
		<div class="login-page">
			<div class="form">
				<form class="login-form" action="" method="post" align="center">
					<input type="text" placeholder="Enter username" class="input" name="username" >
					<input type="password" placeholder="Enter password" class="input" name="password" >  
				<img src="captcha.php" class="bgCaptcha" align="center">
				<input type="text" placeholder="Enter captcha" name="txtCaptcha" class="textCaptcha" >
				<span class="error_message"></span>
					<input type="submit" value="Login" name="submit" class="login-button">
				</form>
			</div>
		</div>	
		<p align="left"> Name: Edwin John Nadarajan </p>
		<p align=" left"> Student ID: 218599279 </p>
	</body>
</html>