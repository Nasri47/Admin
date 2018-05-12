<?php

$id = $_POST["name"];


   include 'connection.php';
   if (isset($_POST['unBlock']))
        {
           $qury = "UPDATE `users` SET `block_state` = 0 WHERE `users`.`user_id` = $id";
           mysqli_query($conn, $qury) ;
           header("Refresh:0 ; url=blockedUsers.php");
        }
?>