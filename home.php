<?php
	session_start();
	if(!isset($_SESSION["user"])){
			header("location: login.php");
	}
?>
<html>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/home.css">
<h1 align="center">SIT780 Assignment 2</h1>
<p align="left"> Name: Edwin John Nadarajan </p>
<p align=" left"> Student ID: 218599279 </p>
</head>
<body>
	<ul>
		<li><a class="active" href="home.php">Home</a></li>
		<li><a href="logout.php" >Logout</a></li>
	</ul>
	<h4>
	<?php
		echo "Welcome, " . $_SESSION["user"]."<br>";
		echo "Privilege: ".$_SESSION["priv"];
	?>
	</h4>
	<div class="menu" align="center">
		<div class="menuDiv"><a href="display.php">Display employee data</a></div>
		<div class="menuDiv"><a href="search.php">Search employee data</a></div>
		<div class="menuDiv"><a href="displayJSON.php">Display Enviornmental Data</a></div>
	 <?php
		if($_SESSION['priv']=='admin'){
			echo '<div class="menuDiv"><a href="add.php">Add new employee data to employee.xml</a></div>';
		}
	 ?>
	</div>
</body>
</html>