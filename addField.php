<?php
include 'addField.html' ;
include 'connection.php';

    session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $filedNme = $_POST['field']; 
      $username = $_POST['username'];
      $location = $_POST['location'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      $stringPhone = strval($phone);
      $salt = encrypt($stringPhone , $username);
      $salt = encrypt($salt , $filedNme);
      $saltTow = encrypt($salt, $stringPhone);
      //Hashing Field password
      $options = [
      'salt' => $saltTow, //write your own code to generate a suitable salt
      'cost' => 12 // the default cost is 10
      ] ;
      $hash = password_hash($password, PASSWORD_DEFAULT, $options);

      $userInfo = $conn->prepare("INSERT INTO users (user_name, user_phone, user_pass , block_state)
                               VALUES ('$username', '$phone', '$hash' , 3)"); 
    $userInfo->execute();
    $fieldInfo = $conn->prepare("INSERT INTO field (field_name, field_city , block_state)
                             VALUES ('$filedNme', '$location' , 0)"); 
    $fieldInfo->execute();

    $userQuery = $conn->query("SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1");
    $userId = $userQuery->fetchColumn();
    $fieldQuery = $conn->query("SELECT field_id FROM field ORDER BY field_id DESC LIMIT 1");
    $fieldId = $fieldQuery->fetchColumn();
      $ownerQuery = $conn->prepare("INSERT INTO ownership (field_id , user_id) VALUES ($fieldId , $userId)"); 
      $ownerQuery->execute();
     header("location: fieldsList.php");

   }

   function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

?> 