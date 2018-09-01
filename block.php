<?php

session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

$id = $_POST["name"];


   include 'connection.php';
   $resons = $_POST['resons'] ;
   if (isset($_POST['block']))
        {
        	$query = $conn->prepare("UPDATE `users` SET `block_state` = 1 WHERE `users`.`user_id` = $id"); 
     		$query->execute();
        $blockResons = $conn->prepare("UPDATE `users` SET `block_resons` = :resons WHERE `users`.`user_id` = $id"); 
        $blockResons->bindParam(':resons', $resons);
        $blockResons->execute();
           header("Refresh:0 ; url=users.php");
        }
?>