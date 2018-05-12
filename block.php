<?php

$id = $_POST["name"];


   include 'connection.php';
   if (isset($_POST['block']))
        {
           $qury = "UPDATE `users` SET `block_state` = 1 WHERE `users`.`user_id` = $id";
           mysqli_query($conn, $qury) ;
           header("Refresh:0 ; url=users.php");
        }
?>