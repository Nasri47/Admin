<?php
include 'index.html' ;
include 'connection.php';
$conn = OpenCon();


/// $viewer = getenv( "HTTP_USER_AGENT" ); 

 //echo $viewer ;

  function test(){
    
     exit(); 
  } 
test() ;
  function creatDB(){
        $sqlconn = mysqli_connect("localhost", "root", ""); 
    
   if(! $sqlconn ) { 
      die('Could not connect: ' .mysql_error()); 
   } 
    
   echo 'Connected successfully'; 
    
   
    
      }
        creatDB() ;
  //CloseCon($conn); 
?> 