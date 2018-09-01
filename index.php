<?php
include 'index.html' ;
include 'connection.php';
     session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = $_POST['username'];
      $mypassword =   $_POST['password'];
      $sql = $conn->prepare("SELECT * FROM users WHERE user_name = :name");
      $sql->bindParam(':name', $myusername);
      $sql->execute();
      $result = $sql->fetchall();
      foreach($result as $qrow) {
         if ($qrow[4] == 2 && password_verify($mypassword , $qrow[3])) {
            $_SESSION['login_user'] = $myusername;         
         header("location: fieldsList.php");
      }else {
         echo '<div style="color: red ; position: absolute; top: 500px ; left: 580px ; text-align: center;">The username or <br> password you enterd is no correct</div>';
      }
         }    
         
   }
?> 