<html>
	<title>Fields</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/fields.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<body>

		<div class="w3-bar w3-border w3-teal w3-row">
			<div class="w3-col s3 w3-center">
				<a href="#" class="w3-bar-item w3-button w3-padding-16 ">Icon</a>
			</div>
			<div class="">
				<a href="users.php" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center">Users</a>
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
				<a href="logout.php" class="w3-bar-item w3-button w3-padding-16 w3-col s1 w3-center">Sign out</a>
		</div>

		
	    <a href="fieldsList.php" style="position: absolute; left: 3% ; top: 90% ; position: fixed;" class="w3-button w3-teal">Fields</a>
	    <div class="topnav">
  <div class="search-container">
    <form action="searchSuspended.php" method="GET">
      <input style="border: 1px solid #e9e9e9;" type="text" placeholder="Search.." name="query">
      <button type="submit" value="search"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

	</body>
</html>
