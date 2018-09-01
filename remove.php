<?php
session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }
$id = $_POST["name"];


   include 'connection.php';
   if (isset($_POST['reject']))
        {
          $query = $conn->prepare("UPDATE `field` SET `block_state` = 2 WHERE `field`.`field_id` = $id"); 
         $query->execute();
           header("location: registRequists.php");
        }elseif (isset($_POST['confirm'])) {
          $qury = $conn->prepare("UPDATE `field` SET `block_state` = 1 WHERE `field`.`field_id` = $id"); 
         $qury->execute();
           header("location: registRequists.php");
        }
?>