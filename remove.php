<?php

$id = $_POST["name"];


   include 'connection.php';
   if (isset($_POST['reject']))
        {
           $qury = "UPDATE `fields` SET `exepted` = 0 WHERE `fields`.`field_id` = $id";
           mysqli_query($conn, $qury) ;
           header("location: registRequists.php");
        }elseif (isset($_POST['confirm'])) {
            $qury = "UPDATE `fields` SET `exepted` = 1 WHERE `fields`.`field_id` = $id";
           mysqli_query($conn , $qury);
           header("location: registRequists.php");
        }
?>