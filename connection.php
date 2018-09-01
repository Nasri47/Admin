<?php 
  global  $dbuser , $dbpass , $db ; 
  $dbhost = "localhost";
  $dbuser  = "root";
  $dbpass  = "";
  $db  = "reservationappdb";
 
 
 //$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 $conn = new PDO('mysql:dbname=reservationappdb;host=localhost;charset=utf8', 'root', '');
 $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 
 function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>