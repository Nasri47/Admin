<?php
   include('session.php');
?>
<html>
	<title>Fields</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/fields.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<body>

		<div class="w3-bar w3-border w3-teal w3-row">
			<div class="w3-col s3 w3-center">
				<a href="#" class="w3-bar-item w3-button w3-padding-16 ">Icon</a>
			</div>
			<div class="">
				<a href="users.html" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center">Users</a>
			</div>
			<div class="">	
				<a href="registRequists.php" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center">Register Requests</a>
			</div>
			<div class="">
				<a href="fieldsList.php" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center w3-white w3-text-teal">Fields</a>
		    </div>
		    <div class="w3-col s2 w3-center">
				<div id="leftSide" class="w3-panel w3-center">
				</div>
			</div>
				<a href="index.php" class="w3-bar-item w3-button w3-padding-16 w3-col s1 w3-center">Sign out</a>
		</div>

		<div class="w3-bar w3-row">
			<div class="w3-col s3">
				<div id="leftSide" class="w3-panel "></div>
			</div>
			<div class="w3-col s6 ">
				<div id="card" class="w3-card w3-panel w3-border ">
					<div class="w3-bar w3-row">
							<button id="loginBt" class="w3-button w3-teal w3-col s3">view profile</button>
						<div >
							<p id="requstText" style="text-align: right; font-size: 14pt;" class="w3-col s9">
							ميدان المجد
						<br><sub>0907900453</sub></p><br>
						</div>
					</div>
				</div>
			</div>
			<div class="w3-col s3 w3-center">
				<div id="leftSide" class="w3-panel w3-center">
				</div>
			</div>
	    </div>

	    <a href="addField.html" style="position: absolute; left: 90% ; top: 90% ;" class="w3-button w3-teal">Add Field</a>

	</body>
</html>
