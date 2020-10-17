<html>
	<head>
		<title>Angular JS - sensor.json</title>
		<script type='text/javascript' src='jquery.js'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/home.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
	</head>
	<body ng-app="myApp" ng-controller="myCtrl">
		<h1 align="center">SIT780 Assignment 2</h1>
		<p align="left"> Name: Edwin John Nadarajan </p>
		<p align=" left"> Student ID: 218599279 </p>
		<script>
			var dat = null;
			function assign(vari){
				window.dat = vari;
			}
			$.ajax({
				dataType: "json",
				url: "sensor.json",
				async: false, 
				success: function(data) {
					console.log(data);
					assign(data.sensorreadinglist);
				}
			});
			console.log(dat);
			var app = angular.module("myApp", []);
			app.controller("myCtrl", function($scope) {
			$scope.records = dat;
			});
		</script>
		<ul>
		<li><a class="active" href="home.php">Home</a></li>
		<li><a href="logout.php">Logout</a></li>
		</ul>
		<table id="table1">
			<thead>
				<tr><th>xbeeid</th><th>moteid</th><th>motelocation</th><th>hubname</th><th>temperature</th><th>airpressure</th><th>humidity</th><th>light</th><th>altitude</th><th>mic</th><th>gas</th></tr>
			</thead>
			<tbody>
				<tr ng-repeat="x in records">
					<td>{{x.xbeeid}}</td>
					<td>{{x.moteid}}</td>
					<td>{{x.motelocation}}</td>
					<td>{{x.hubname}}</td>
					<td>{{x.temperature}}</td>
					<td>{{x.airpressure}}</td>
					<td>{{x.humidity}}</td>
					<td>{{x.light}}</td>
					<td>{{x.altitude}}</td>
					<td>{{x.mic}}</td>
					<td>{{x.gas}}</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>
