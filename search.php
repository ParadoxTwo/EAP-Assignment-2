<?php
	session_start();
	if(!isset($_SESSION["user"])){
			header("location: login.php");
	}	
?>
<html>
	<head>
		<title>Search XML Data</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="css/homepage.css">
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
		<form action="" method="post" class="searchXML">
			<input type="text" placeholder="Enter Lastname"  name="searchData" />
			<input type="submit" value="Search" name ="search" class="searchXMLButton"/>
		
		<?php
			if (isset($_POST['search'])) {
				$searchData = $_REQUEST["searchData"];
				$xml = simplexml_load_file('employee.xml')
				or die("Error: Cannot create object");
				$employeeID = $xml->xpath('//employee[Surname="'.$searchData.'"]/employee_id/text()');
				$emailId = $xml->xpath('//employee[Surname="'.$searchData.'"]/employee_id/@email');
				$givenname = $xml->xpath('//employee[Surname="'.$searchData.'"]/Givenname/text()');
				$lastname= $xml->xpath('//employee[Surname="'.$searchData.'"]/Surname/text()');
				if($employeeID ==''){
					echo '<span>No data available</span>';
				}else{
		?>
		</form>
					<table>
						<tr><th>Employee ID</th><th>Given Name</th><th>Last Name</th><th>Email ID</th></tr>
		<?php				foreach($employeeID as $i => $row){
		?>						
							<tr>
							<td><?php echo $employeeID[$i];?></td>
							<td><?php echo $givenname[$i];?></td>
							<td><?php echo $lastname[$i];?></td>
							<td><a href="mailto:<?php echo $emailId[$i];?>"><?php echo $emailId[$i];?></a></td>
						</tr>
		<?php					
						}
		?>								
					</table>				
		<?php							
				}			
			}
		?>
	</body>
</html>