<?php
	$dbuser = "edwinj";
	$dbpass = "Winbro2@";
	$db = "SSID";
	$connect = OCILogon($dbuser, $dbpass, $db);
	if (!$connect){
		echo "An error occurred connecting to the database";
		exit;
	}
?>