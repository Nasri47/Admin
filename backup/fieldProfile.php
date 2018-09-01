<?php
session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

 ?>

<!DOCTYPE html>
<html>
	<title>Profile</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/fieldProfile.css">
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
				<a href="fieldsList.php" class="w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center">Fields</a>
		    </div>
		    <div class="w3-col s2 w3-center">
				<div id="leftSide" class="w3-panel w3-center">
				</div>
			</div>
				<a href="logout.php" class="w3-bar-item w3-button w3-padding-16 w3-col s1 w3-center">Sign out</a>
		</div>

		<?php 

include 'connection.php';

$id = $_POST["name"];

$query = $conn->prepare("SELECT * FROM field WHERE field_id = $id"); 
     $query->execute();
     $result = $query->fetchall();

     $reserveQuery = $conn->prepare("SELECT * FROM reserve WHERE field_id = $id"); 
     $reserveQuery->execute();
     $resResult = $reserveQuery->fetchall();
     $row  ;
     $open_time ;
     $close_time;
     foreach($result as $qrow) {

        $fieldName = $qrow[1] ;
        $size = $qrow[2] ;
        $city = $qrow[5] ;
        $hourPrice = $qrow[8] ;

        $open_time = $qrow[6] ;
        $open = date('g:ia', strtotime($qrow[6]));
        $close_time = $qrow[7] ;
        $close = date('g:ia', strtotime($qrow[7]));

     }
        $starttime = strtotime($open_time);
        $endtime = strtotime($close_time);
        $diff = $endtime - $starttime;
        $total = $diff/60/60*2 ;
        $dives = "" ;
        $endTime = $open_time ;
        $date = date_create_from_format('H:i:s', $endTime);
        
        $startList =  array();
        $endList =  array();
        $count = 0 ;
        foreach($resResult as $resRow) {            
             if ($resRow[5] == null || $resRow[5] == 1) {
                $startList[$count] = $resRow[3] ;
                $endList[$count] = $resRow[4] ;
                $count += 1 ;
            }
        }
        $length = count($endList) ;
        for ($l=0; $l < $length ; $l++) { 
            $divesNum = 0 ;
            $reStart = $startList[$l] ;
            $resEnd = $endList[$l] ;
            $resStartTime = strtotime($reStart);
            $resEndTime = strtotime($resEnd);
            $halph = $resEndTime - $resStartTime ;
            $halph = $halph/60/60*2 ;
            $divesNum+=$halph ;
            $total -= $divesNum ; 
            $total = $total + 1 ;
        }
        //$total = $total - 1 ;
        
        for ($i=0; $i < $total ; $i++) {
            for ($x = 0 ; $x < $length ; $x++) {
                $resTi = date_create_from_format('H:i:s', $startList[$x]);
                $reEsTi = date_create_from_format('H:i:s', $endList[$x]);
                $reStart = $startList[$x] ;
                $resEnd = $endList[$x] ;
                $resStartTime = strtotime($reStart);
                $resEndTime = strtotime($resEnd);
                $halph = $resEndTime - $resStartTime ;
                $halph = $halph/60/60*2 ;

                
                if ($date == $resTi ) {
                    for ($y=0; $y < $halph; $y++) { 
                       $date = date_add($date, date_interval_create_from_date_string("+30 minutes"));
                    if ($date == $reEsTi ) {
                        $dives = $dives . "
                    <div class='card--content' style='background-color:#c74747 ; text-align:center ;'>
                        <div style='font-style: bold ; font-size: 10pt ; padding-top:45px;'>$startList[$x]/$endList[$x]</div>
                    </div>" ;
                    }
                }
            }
        }
            $lemit = date_create_from_format('H:i:s', $close_time);
            if ($date < $lemit) {
                $date = date_add($date, date_interval_create_from_date_string("+30 minutes"));
            $result = $date->format('H:i:s');
            $start_date = date('H:i:s', strtotime($result)) ;
            $dives = $dives . "
            <div class='card--content'>
            <input onclick='calc(this.id);' style='left: 85% ; top: 0% ; color: transparent;' class='w3-check' type='checkbox' name='periods[]' value='$start_date' id='$i'>
                <div style='font-style: bold ; font-size: 10pt ; padding-top:17px; padding-left:45px ;'>
                    $start_date
                </div>
            </div>" ;
            }

            if ($i == 3) {
            }
            
        }

         echo "<div class='w3-bar w3-border w3-row' style='background-color: #C0C0C0 ;'>
			<div class='w3-col s3 w3-center'>
				<a href='#' class='w3-bar-item w3-button w3-padding-16 '>Icon</a>
			</div>
				<form action='fieldProfile.php' method='post'>
                            <input name='name' value='$id' hidden>
                            
                            <input class='w3-bar-item w3-button w3-white w3-padding-16 w3-col s2 w3-center' value='Home' name='viewProfile' type='submit'>
                </form>

                <form action='reserveRequest.php' method='post'>
                            <input name='name' value='$id' hidden>
                            <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='reservations' name='reservations' type='submit'>
                </form>

                <form action='complaints.php' method='post'>
                            <input name='name' value='$id' hidden>
                            <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit'>
                </form>
		    <div class='w3-col s2 w3-center'>
				<div id='leftSide' class='w3-panel w3-center'>
				</div>-
			</div>
		</div>
        <div class='w3-bar w3-row ' id='cardBlock'>

                <div class='w3-col s3 '>
                    <div id='leftSide' class='w3-panel '></div>
                </div>

                    <div class='w3-col s6'>
                        <div id='card' class='w3-card w3-panel w3-border '>                         
                                <img style='width: 100% ; height: 200px ;' class='mySlides' src='images/whistle.png'>                         
                        </div>
                    </div>
                <div class='w3-col s3 '>
                    <div id='leftSide' class='w3-panel '></div>
                </div>
        </div>
            <div >


                <div class='w3-bar w3-row ' id='cardBlock'>

                <div class='w3-col s3 '>
                    <div id='leftSide' class='w3-panel '></div>
                </div>

                    <div class='w3-col s6' style='border-left: 6px solid #18A7B5; background-color: #e6fff7;'>
                        
                        <div class='w3-bar w3-row ' id='cardBlock'>

                <div class='w3-col s1'>
                    <div id='leftSide' class='w3-panel '></div>
                </div>

                    <div class='w3-col s10'>
                        <p class='w3-center'>$fieldName</p>
                    </div>
         <button onclick='openEdit()' class='w3-button w3-black w3-col s1 w3-center fa fa-edit'></button>
                            
  <div id='id01' class='w3-modal' >
    <div class='w3-modal-content' style='width:30%'>
      <div class='w3-container'>
        <span onclick='closeEdit();' class='w3-button w3-display-topright'>&times;</span>
        <p id='login'>Edit informations</p>
                <form action='changeInfo.php' method='post'>
                <input name='name' value='$id' hidden>
                    <input id='fieldInputs' class='w3-input' type='text' name ='fieldName' placeholder='$fieldName'>
                    <input id='fieldInputs' class='w3-input' type='text' name = 'cityName' placeholder='$city'>
                    <input id='fieldInputs' class='w3-input' type='text' name = 'size' placeholder='$size'>
                    <input id='fieldInputs' class='w3-input' type='text' name = 'hourPrice' placeholder='$hourPrice SDG'>
                    <input id='fieldInputs' class='w3-input' type='text' name = 'open' placeholder='$open'>
                    <input id='fieldInputs' class='w3-input' type='text' name = 'close' placeholder='$close'>
                    <input style='margin-bottom: 20px ;' class='w3-button w3-teal' type='submit' value='Save' name='submit' >
                </form>
      </div>
    </div>
  </div>


            </div>

        <div class='w3-bar w3-row ' id='cardBlock'>

                <div class='w3-col s1'>
                    <div id='leftSide' class='w3-panel '></div>
                </div>

                    <div class='w3-col s5'>
                        <p class='w3-center'>$city</p>
                    </div>
                    <div class='w3-col s5'>
                        <p class='w3-center'>$size m</p>
                    </div>
                <div class='w3-col s1'>
                    <div id='leftSide' class='w3-panel '></div>
                </div>
        </div>

        <div class='w3-bar w3-row ' id='cardBlock'>

                <div class='w3-col s1'>
                    <div id='leftSide' class='w3-panel '></div>
                </div>

                    <div class='w3-col s5'>
                        <p class='w3-center'>$hourPrice SDG</p>
                    </div>
                    <div class='w3-col s5'>
                        <p class='w3-center'>$open to $close</p>
                    </div>
                <div class='w3-col s1'>
                    <div id='leftSide' class='w3-panel '></div>
                </div>
        </div>

                    </div>
        </div>
            <form action='reserve.php' method='post'>
                <input name='name' value='$id' hidden>
        <section class='card' style='position: absolute; left: 25% ; width: 670px ;'>
          $dives
        </section>
<div id='loginCard' class='w3-container' style='position: absolute; top: 700px ;'>
      <div id='card' class='w3-card w3-panel w3-border'>
        <p id='login'>Login</p>
          <input id='userInput' required='required' class='w3-input' type='text' name = 'username' placeholder='username' disabled>
          <input id='userPass' required='required' class='w3-input' type='text' name = 'user_phone' placeholder='phone number'  disabled>
          <input id='loginBt' class='w3-button w3-teal' type='submit' value='submit' name='submit' >
      </div>
    </div>   
        
                    </form>     

         
                   
        ";  
 ?>

            
                    
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script >
        var counter = 0 ;
        function calc(check_id) {
            var dive = document.getElementById(check_id) ;
            if (dive.checked) {
                counter++ ;
            } else {
                counter-- ;
            }
            
            if (counter >= 2) {
                document.getElementById("userInput").disabled = false;
                document.getElementById("userPass").disabled = false;
            }else{
                document.getElementById("userInput").disabled = true;
                document.getElementById("userPass").disabled = true;
            }
        }
        function openEdit(){
            document.getElementById('id01').style.display='block' ;

        }
        function closeEdit(){
            document.getElementById('id01').style.display='none' ;
        }
        </script>
	</body>
</html>


