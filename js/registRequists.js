<!DOCTYPE html>
<html>
	<title>Register Requests</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/fileds.css">
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
				<a href="registRequists.html" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center w3-text-teal w3-white">Register Requests</a>
			</div>
			<div class="">
				<a href="fields.php" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center">Fields</a>
		    </div>
		    <div class="w3-col s2 w3-center">
				<div id="leftSide" class="w3-panel w3-center">
				</div>
			</div>
				<a href="index.php" class="w3-bar-item w3-button w3-padding-16 w3-col s1 w3-center">Sign out</a>
		</div>

		<div class="w3-bar w3-row ">
			<div class="w3-col s3 ">
				<div id="leftSide" class="w3-panel "></div>
			</div>
			<div class="w3-col s6 ">
				<div id="card" class="w3-card w3-panel w3-border ">
					<div class="w3-bar w3-row">
						<div class="w3-col s4 ">
							<div id="leftSide" class="w3-panel "></div>
						</div>
						<p id="requstText" style="text-align: right; font-size: 16pt;" class="w3-col s8">
							يطلب صاحب ميدان المجد أن يتم تسجيل الميدان الخاص به في التطبيق
						</p><br>
						<div class="w3-col s10">
							<a style="text-align: right; font-size: 14pt ; font-family: bold ; background-color: transparent;" href="#" class="w3-dropdown-hover">
							التفاصيل
								<div class="w3-dropdown-content w3-card-4" style="width:250px">
								    <div class="w3-container">
								      <p>London is the capital city of England.</p>
								      <p>It is the most populous city in the UK.</p>
								    </div>
								  </div>
							</a>
						</div>
						<button style="text-align: right; font-size: 14pt ; color: red ;" class="button" id="loginBt" class="w3-col s1">رفض</button>
						<button style="text-align: right; font-size: 14pt ; color: green ;" class="button" id="loginBt" class="w3-col s1"> قبول</button>
					</div>
				</div>
			</div>
			<div class="w3-col s3 w3-center">
				<div id="leftSide" class="w3-panel w3-center">
				</div>
			</div>
	    </div>
	    <script type="text/javascript" src="js/regiterRequests.js"></script>
	</body>
</html>
