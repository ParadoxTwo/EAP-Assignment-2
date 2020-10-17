<?php
	session_start();
	if(!isset($_SESSION["user"]) || ($_SESSION["priv"]=='guest')){
			header("location: login.php");
	}
?>
<html>
<head>
<title>Add Employee Data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<h1 align="center">SIT780 Assignment 2</h1>
<p align="left"> Name: Edwin John Nadarajan</p>
<p align=" left"> Student ID: 218599279 </p>
</head>
<body>
	<ul>
	  <li><a class="active" href="home.php">Home</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
	<form action="" method="POST" class="addXML">
		<input type="text" placeholder="Enter Employee ID"  name="employee_id"/>
		<input type="text" placeholder="Enter Email ID"  name="emailID"/>
		<input type="text" placeholder="Enter First Name"  name="firstName"/>
		<input type="text" placeholder="Enter Last Name"  name="lastName"/>
		<input type="submit" value="Add" name ="addData" class="addXMLButton"/><br>
	<?php
		if (isset($_POST['addData'])) {
			if (empty($_POST['employee_id']) || empty($_POST['firstName'])|| empty($_POST['lastName']) ) {
					echo '<script>alert("Please enter all fields")</script>';
			}else{
				$employee_id = $_REQUEST["employee_id"];
				$firstName = $_REQUEST["firstName"];
				$lastName = $_REQUEST["lastName"];
				$emailID = $_REQUEST["emailID"];
				$xml = simplexml_load_file('employee.xml');
				$employee = $xml->addChild('employee');
				$employee->addChild('employee_id', $employee_id)->addAttribute('email',$emailID);
				$employee->addChild('Surname', $lastName);
				$employee->addChild('Givenname', $firstName);
				$xml->asXML('employee.xml');
			}
		}
	?>
	</form>
	<?php
		$xml = simplexml_load_file("employee.xml")
		or die("Error: Cannot create object");
		$element_name = array();                                   
		foreach ($xml->children()->children() as $value) {
			$element_name[] = $value->getName();
		}
	?>
	<table border = "1">
	<thead>
	<tr><th>Employee ID</th><th>Last Name</th><th>First Name</th><th>Email ID</th></tr>
	</thead>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach ($xml->children() as $value) {             
			echo "<tr>";    
			for ($i = 0; $i < count($element_name); $i++) {
				echo "<td>{$value->children()[$i]}</td>";			
			}
			echo "<td><a href='mailto:{$value->employee_id['email']}'>{$value->employee_id['email']}</a></td>";
			echo "</tr>";
		}
	?>	
</body>
</html>