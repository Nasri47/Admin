<?php
include 'addField.html' ;
include 'connection.php';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $filedNme = mysqli_real_escape_string($conn,$_POST['username']);
      $location = mysqli_real_escape_string($conn,$_POST['location']);
      $phone = mysqli_real_escape_string($conn,$_POST['phone']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      
      $userInfo = "INSERT INTO users (user_name, user_phone, user_pass)
              VALUES ('$filedNme', '$phone', '$password')";
      $fieldInfo = "INSERT INTO fields (field_name, field_city , exepted)
              VALUES ('$filedNme', '$location' , 1)";

      mysqli_query($conn, $userInfo);
      mysqli_query($conn, $fieldInfo); 

    header("location: fieldsList.php");

   }

?> 