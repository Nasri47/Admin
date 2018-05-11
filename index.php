<?php
include 'index.html' ;
include 'connection.php';
     session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT user_id FROM users WHERE user_name = '$myusername' and user_pass = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: fieldsList.php");
      }else {
         echo '<div style="color: red ; position: absolute; top: 500px ; left: 580px ; text-align: center;">The username or <br> password you enterd is no correct</div>';
      }
   }

?> 