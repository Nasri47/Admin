<?php 
function OpenCon()
 {
  global  $dbuser , $dbpass , $db ; 
  $dbhost = "localhost";
  $dbuser  = "root";
  $dbpass  = "";
  $db  = "lybarary";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 
 return $conn;
 }
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>