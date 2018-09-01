<?php
session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }
$id = $_POST["name"];
$user_id = $_POST["user_id"];
$resons = $_POST["resons"];

   include 'connection.php';
   if (isset($_POST['ignore']))
        {
          $query = $conn->prepare("UPDATE `blockrequests` SET `response` = 1 WHERE `blockrequests`.`request_id` = $id"); 
         $query->execute();
           header("location: blockrequest.php");
        }elseif (isset($_POST['block'])) {
          $reQuery = $conn->prepare("UPDATE `blockrequests` SET `response` = 1 WHERE `blockrequests`.`request_id` = $id");
         $reQuery->execute();
          $qury = $conn->prepare("UPDATE `users` SET `block_state` = 1 , `block_resons` = :reson  WHERE `users`.`user_id` = $user_id");
           $qury->bindValue(':reson' , $resons);
         $qury->execute();
           header("location: blockedUsers.php");
        }
?>