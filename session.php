<?php
include 'index.html' ;
include 'connection.php';
$conn = OpenCon();

     $userName=mysql_real_escape_string($_POST['username']); 
     $password=mysql_real_escape_string($_POST['password']); 
     $passWord=md5($password);

      $login = mysqli_query("SELECT userName,password FROM 'member' WHERE userName = $userName AND passWord= $password");

      $res = mysql_query($login);

      $rows = mysql_num_rows($res);

      if ($rows==1) {
      // Set username session variable

      $_SESSION['userName'] = $_POST['username'];

     // Jump to secured page
      header("Location: securedpage.php");
     }
     else {
     // Jump to login page
     echo "user name and password not found";
     }
  CloseCon($conn); 
?> 