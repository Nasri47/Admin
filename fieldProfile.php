<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html> 
<head>
  <title>Profile</title>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="css/addUser.css">
    <link rel="stylesheet" href="css/fieldProfile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<style type="text/css">

html{
    height: auto;
    overflow: hidden;
}

body{
    height: 100px;
}

  .cardblock{

  }


  .absdiv{
   

  }

  .resform{
    display:inline-block;
  }
  .resd{
    position: relative;
    top: -100px;
    display: inline-block;
    height: 80vh;
    overflow: scroll;
    width: 50% !important;
  }



#loginCard{
  background-color: white;
  width: 30% ;
}

.fas{
    
    font-size: 20px;
}


</style>



</head>
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
foreach ($result as $fieldRow) {
    if ($fieldRow[9] == 1) {
        $ownersip = $conn->prepare("SELECT * FROM ownership WHERE field_id = $id");
        $ownersip->execute();
        $ownerResult = $ownersip->fetchall();
        foreach ($ownerResult as $ownerRow) {
        $ownerName ;
        $ownerPhone ;
        $owner = $conn->prepare("SELECT * FROM users WHERE user_id = $ownerRow[2]");
        $owner->execute();
        $userResult = $owner->fetchall();
        foreach ($userResult as $userRow) {
          $ownerName = $userRow[1];
          $ownerPhone = $userRow[2] ;
        }
        }
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
$ths = "" ;
$trs = "" ;
$tabl = "" ;
$uName = "" ;
$uPhone = "" ;
$tableCounter = 0 ;
$endTime = $open_time ;
$date = date_create_from_format('H:i:s', $endTime);
$endDate = date_create_from_format('H:i:s', $endTime);
$endDate = date_add($endDate, date_interval_create_from_date_string("+30 minutes"));
$startList =  array();
$endList =  array();
$idList =  array();
$userIdList =  array();
$startResult = array() ;
$endResult = array() ;
$count = 0 ;
foreach($resResult as $resRow) {            
 if ($resRow[5] == 0 || $resRow[5] == 1) {
    $startList[$count] = $resRow[3] ;
    $endList[$count] = $resRow[4] ;
    $idList[$count] = $resRow[0] ;
    $userIdList[$count] = $resRow[2] ;
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
        $startResult[$x] = date('g:ia', strtotime($startList[$x]));
        $endResult[$x] = date('g:ia', strtotime($endList[$x]));
        $reStart = $startList[$x] ;
        $resEnd = $endList[$x] ;
        $resStartTime = strtotime($reStart);
        $resEndTime = strtotime($resEnd);
        $halph = $resEndTime - $resStartTime ;
        $halph = $halph/60/60*2 ;

        
        if ($date == $resTi ) {
            for ($y=0; $y < $halph; $y++) { 
               $date = date_add($date, date_interval_create_from_date_string("+30 minutes"));
               $endDate = date_add($endDate, date_interval_create_from_date_string("+30 minutes"));
               if ($date == $reEsTi ) {
                $query = $conn->prepare("SELECT * FROM users WHERE user_id = $userIdList[$x]"); 
                $query->execute();
                $result = $query->fetchall();
                foreach($result as $row){
                    $uName = $row[1] ;
                    $uPhone = $row[2] ;
                }
                $tid = $x + 1 ;
                $ths = "" ; 
                $tableCounter+= 1 ;
                $ths = $ths . "
                <th>
                    <div  style='background-color:#c74747 ; text-align:center ; width:100% ; height: 80px ;'>
                        <form action='canclingReserve.php' method='post'>
                            <input name='name' value='$id' hidden>
                            <input name='reserveId' value='$idList[$x]' hidden>
                            <div style='font-style: bold ; font-size: 10pt ; padding-top:25px;'>$startResult[$x]-$endResult[$x]</div>
                            <div class='w3-row'>
                              <div class='w3-col s12'>
                               <div class='w3-col s6'>
                                 <input class='w3-button fa fa-close' type='submit' value='cancle' name='cancleReserve'>
                             </div>
                             <div class='w3-col s6'>
                                 <span class='collapsiblec feed indicac w3-button far fa'>
                                    info     </span>
                                </div>
                                <div class='contentamen'>
                                 <div style='width: 400px; height: 70px; background: #ccc;'>
                                   <div class='w3-bar w3-row'>
                                     <div class='w3-col s12 w3-center'>
                                       <p id='requstText' style='text-align: left; font-size: 10pt; padding-left:8px;' class='w3-col s12'>
                                         reserver name : $uName
                                         <br>phone number : $uPhone
                                     </p><br>
                                 </div>
                             </div> 
                         </div>                    
                     </div>
                 </div>
             </div>

         </form>
     </div>
 </div>

</th>" ;
$trs = $trs . "<tr> $ths </tr>" ;
}
}
}
}
$lemit = date_create_from_format('H:i:s', $close_time);
$lemit = date_add($lemit, date_interval_create_from_date_string("+30 minutes"));
$endDateResult = $endDate->format('H:i:s');
$endTRes = date('g:ia', strtotime($endDateResult)) ;
$result = $date->format('H:i:s');
$start_date = date('g:ia', strtotime($result)) ;
if ($date < $lemit && $result != "12:00:00") {
    $tableCounter+= 1 ;
    $ths = "" ;
    
    $ths = $ths . "
    <th class='card--content'>
        <input onclick='calc(this.id);' style='left: 47% ; top: 0% ; color: transparent;' class='w3-check' type='checkbox' name='periods[]' value='$result' id='$i'>
        <div style='width:400px ; height: 50px ; font-style: bold ; font-size: 10pt ; padding-left:5% ;'>
            $start_date - $endTRes
        </div>
    </th>" ;
    $trs = $trs . "<tr> $ths </tr>" ;
    $date = date_add($date, date_interval_create_from_date_string("+30 minutes"));
    $endDate = date_add($endDate, date_interval_create_from_date_string("+30 minutes"));
}

}

echo "<div class='w3-bar w3-border w3-row' style='background-color: #C0C0C0 ;'>
<div class='w3-col s3 w3-center'>
    <button onclick='openSuspend()' class='w3-bar-item w3-button w3-red w3-padding-16 w3-col s4 w3-center'>Suspend</button>
</div>
<div id='suspend' class='w3-modal' >
                    <div class='w3-modal-content' style='width:30%'>
                      <div class='w3-container'>
                        <span onclick='closeSuspend();' class='w3-button w3-display-topright'>&times;</span>
                        <p id='login'>Suspend resones</p>
                        <form action='suspendField.php' method='post'>
                            <input name='name' value='$id' hidden>
                            <textarea id='fieldInputs' class='w3-input' type='text' name = 'resons' placeholder='Enter suspention resons'></textarea>
                            <input id='susBt' style='margin-bottom: 20px ;' class='w3-button w3-red' type='submit' value='Suspend' name='suspend' disabled>
                        </form>
                    </div>
                </div>
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

</div>
</div>



  
</div>







<div class='absdiv w3-col m4 l4'>

<div class='w3-bar w3-row ' id='cardBlock'>

   

    <div class='w3-col l12 m12 s6'>
        <div id='' class=' '>                         
        <img style='width: 100% ;' class='mySlides' src='images/stadium.jpg'>                         
        </div>
    </div>









    <div class='w3-bar w3-row ' id='cardBlock'>

       

        <div class='w3-col l12 m12 s6' style='border-left: 6px solid #18A7B5; background-color: #e6fff7;'>

            <div class='w3-bar w3-row ' id='cardBlock'>

              



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



                 







                <div class='w3-col s10'>
                <div class='w3-col m6 s6 l6'><b> <p class='w3-center' style='font-size:20px;'><i class='fas fa-futbol'></i> $fieldName</p></b></div>
                <div class='w3-col m6 s6 l6'>  <p class='w3-left' style='color:white; font-size:15px; border-radius:5px;; padding:10px; background-color:green;'><i class='fas fa-check'></i> Availabe </p></div>
                   
                </div>










                <button onclick='openEdit()' class='w3-button fas w3-col s1 w3-right fa fa-edit'></button>
                










              

        <div class='w3-bar w3-row ' id='cardBlock'>

           

            <div class='w3-col m12 s5' style='padding-left:20px;'>

<div class='w3-col m3 s3 l3'><p class='w3-center'> <i class='fas fa-user'></i><br> $ownerName<br> <br> <i class='fas fa-map-marker-alt'></i><br> $city  </p></div>
<div class='w3-col m3 s3 l3'><p class='w3-center'> <i class='fas fa-phone'></i><br> $ownerPhone<br> <br> <i class='fas fa-ruler-horizontal'></i><br> $size m </p></div>
<div class='w3-col m3 s3 l3'><p class='w3-center'> <i class='fas fa-dollar-sign'></i><br> $hourPrice SDG </p></div>
<div class='w3-col m3 s3 l3'><p class='w3-center'> <i class='fas fa-clock'></i><br> $open to $close </p></div>

            




            </div>

        
            
        </div>


        <div class='w3-bar w3-row ' id='cardBlock'>


            <div class='w3-col s5'>
                <p class='w3-center'></p>
            </div>
            <div class='w3-col s5'>
                <p class='w3-center'></p>
            </div>
           
        </div>
















    </div>
</div>







</div>
</div>



<br><br><br><br><br>



<div class='w3-col m2 l2 s2'>
<br>
</div>


<form action='reserve.php' method='post'>
    <input name='name' value='$id' hidden>













 <div class='w3-col m12 l12 resd'>
    <table class='' style=' width:50% ; float:right;  margin-top:0px; margin-right:10px;'>
      $trs
  </table>
</div>








  <div id='loginCard' class='w3-container' style='left : 36% ; top:20%;'>
      <div id='card' class='w3-card w3-panel w3-border'>
        <p id='login'>User informations</p>
        <input id='userInput' required='required' class='w3-input' type='text' name = 'username' placeholder='Enter usernme' disabled>
        <div id='nameMess'>
          <p id='nameChar' class='invalid'>Only <b>characters</b></p>
          <p id='spaces' class='valid'>No <b>spaces allowed</b></p>
          <p id='nameLng' class='invalid'>Maximum <b>30 characters</b></p>
      </div>
      <input id='userPass' required='required' class='w3-input' type='text' name = 'user_phone' placeholder='Enter user phone number'  disabled>
      <div id='phoneMess'>
          <p id='phoneNum' class='invalid'>Only <b>numbers</b></p>
          <p id='phoneLng' class='invalid'>Length <b>10 numbers</b></p>
      </div>
      <input id='loginBt' class='w3-button w3-teal' type='submit' value='reserves' name='reserves' disabled>
  </div>
</div>   

</form> 



";
    }elseif ($fieldRow[9] == 2) {
        echo "<div class=' w3-row w3-center'>

  

    <div class='w3-col s6'>
        <div  class='w3-panel'>                         
        <div style='width: 100% ; height: 150px ;'></div>                        
        </div>
    </div>
    
</div>

<div class='w3-row w3-center' id=''>

  

    <div class='w3-col s6 w3-center' style='margin-left:25%'>
        <div id='card' class='w3-panel w3-border w3-center'>                         
        $fieldRow[1] field is suspended.. <br> <sub>$fieldRow[10]</sub>  <br><br>
        <form action='unSuspendField.php' method='post'>
                            <input name='name' value='$id' hidden>
                            <input id='susBt' style='margin-bottom: 20px ;' class='w3-button w3-teal w3-center' type='submit' value='Unsuspend' name='unsuspend'>
                        </form>
        </div>
    </div>
  
</div>
";
    }
}

  



?>



<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/addUser.js"></script>
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
            document.getElementById("userPass").value = "";
            document.getElementById("userInput").value = "";
            document.getElementById("userInput").disabled = true;
            document.getElementById("userPass").disabled = true;
            document.getElementById("loginBt").disabled = true;
        }
    }
    function openEdit(){
        document.getElementById('id01').style.display='block' ;

    }
    function closeEdit(){
        document.getElementById('id01').style.display='none' ;
    }
    var suBt = document.getElementById('susBt') ;
        var fieldInputs = document.getElementById('fieldInputs') ;
    function openSuspend(){
        document.getElementById('suspend').style.display='block' ;
        
        

    }
    function closeSuspend(){
        document.getElementById('suspend').style.display='none' ;
    }
    fieldInputs.onkeyup = function(){
        if (fieldInputs.value.length > 0) {
            suBt.disabled = false;
        }
         else {
            suBt.disabled = true;
         }
    }
        //collaps
        var coll = document.getElementsByClassName("feed");
        var i;
        var contt=0;
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.parentNode.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;

          } else {
              content.style.maxHeight = content.scrollHeight + "px";

          } 
      });
      }


        //user input 

        var fName = document.getElementById("userInput");
        var phone = document.getElementById("userPass");

        var nameChar = document.getElementById("nameChar");
        var nameLng = document.getElementById("nameLng");
        var spaces = document.getElementById("spaces");

        var phoneNum = document.getElementById("phoneNum");
        var phoneLng = document.getElementById("phoneLng");

        var namFlag = false ;
        var phonFlag = false ;

        fName.onfocus = function() {
            document.getElementById("nameMess").style.display = "block";
            document.getElementById("phoneMess").style.display = "none";
            document.getElementById("passMess").style.display = "none";
            document.getElementById("passConMess").style.display = "none";
        }

        phone.onfocus = function() {
            document.getElementById("nameMess").style.display = "none";
            document.getElementById("phoneMess").style.display = "block";
            document.getElementById("passMess").style.display = "none";
            document.getElementById("passConMess").style.display = "none";
        }

        fName.onblur = function() {
          document.getElementById("nameMess").style.display = "none";
      }

      phone.onblur = function() {
          document.getElementById("phoneMess").style.display = "none";
      }
      fName.onkeyup = function() {
          var lowerCaseLetters = /[a-z]/g;
          var upperCaseLetters = /[A-Z]/g;
          var numbers = /[0-9]/g;
          if((fName.value.match(lowerCaseLetters) || fName.value.match(upperCaseLetters)) && !fName.value.match(numbers)) { 
            nameChar.classList.remove("invalid");
            nameChar.classList.add("valid");
            namFlag = true ;
        } else {
            nameChar.classList.remove("valid");
            nameChar.classList.add("invalid");
            namFlag = false ;
        }

        if(fName.value.length <= 30 && fName.value.length > 0) {
            nameLng.classList.remove("invalid");
            nameLng.classList.add("valid");
            namFlag = true ;
        } else {
            nameLng.classList.remove("valid");
            nameLng.classList.add("invalid");
            namFlag = false ;
        }
        if(fName.value.match(" ")) {
            spaces.classList.remove("valid");
            spaces.classList.add("invalid");
            namFlag = false ;
        } else {
            spaces.classList.remove("invalid");
            spaces.classList.add("valid");
            namFlag = true ;
        }
        if (namFlag && phonFlag) {
            document.getElementById("loginBt").disabled = false;
        } else {
            document.getElementById("loginBt").disabled = true;

        }
    }

    phone.onkeyup = function() {
      var numbers = /[0-9]/g;
      if(phone.value.match(numbers)) { 
        phoneNum.classList.remove("invalid");
        phoneNum.classList.add("valid");
        phonFlag = true ;
    } else {
        phoneNum.classList.remove("valid");
        phoneNum.classList.add("invalid");
        phonFlag = false ;
    }

    if(phone.value.length == 10) {
        phoneLng.classList.remove("invalid");
        phoneLng.classList.add("valid");
        phonFlag = true ;
    } else {
        phoneLng.classList.remove("valid");
        phoneLng.classList.add("invalid");
        phonFlag = false ;
    }

    if (namFlag && phonFlag) {
        document.getElementById("loginBt").disabled = false;
    } else {
        document.getElementById("loginBt").disabled = true;

    }

}


</script>
</body>
</html>


