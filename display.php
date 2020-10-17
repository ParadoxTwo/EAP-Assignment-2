<?php
	session_start();
	if(!isset($_SESSION["user"])){
			header("location: login.php");
	}
?>
<html>
	<head>
		<title>Display Employee Data</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="css/home.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
	</head>
	<body>
		<h1 align="center">SIT780 Assignment 2</h1>
		<p align="left"> Name: Edwin John Nadarajan </p>
		<p align=" left"> Student ID: 218599279 </p>
		<ul>
		<li><a class="active" href="home.php">Home</a></li>
		<li><a href="logout.php">Logout</a></li>
		</ul>
		<?php
			$xml = simplexml_load_file("employee.xml")
			or die("Error: Cannot create object");

			$element_name = array();  
			foreach ($xml->children()->children() as $value) {
				$element_name[] = $value->getName();
			}
		?>
		<table>
		<thead>
			<tr><th>Employee ID</th><th>Last Name</th><th>First Name</th><th>Email ID</th></tr>
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
			</tbody>
		</table>
	</body>
</html>