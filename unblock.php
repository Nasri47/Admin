<?php

session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

$id = $_POST["name"];


   include 'connection.php';
   if (isset($_POST['unBlock']))
        {
           $query = $conn->prepare("UPDATE `users` SET `block_state` = 0 WHERE `users`.`user_id` = $id"); 
     	   $query->execute();
           header("Refresh:0 ; url=blockedUsers.php");
        }
?>