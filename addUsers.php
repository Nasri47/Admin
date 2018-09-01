<?php
include 'addUsers.html' ;
include 'connection.php';

session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

    
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $username = $_POST['username'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      $stringPhone = strval($phone);
      $salt = encrypt($stringPhone , $username);
      $saltTow = encrypt($salt, $stringPhone); 

      //Hashing Admin password
      $options = [
      'salt' => $saltTow, //write your own code to generate a suitable salt
      'cost' => 12 // the default cost is 10
      ] ;
      $hash = password_hash($password, PASSWORD_DEFAULT, $options);

      $userInfo = $conn->prepare("INSERT INTO users (user_name, user_phone, user_pass , block_state)
                               VALUES ('$username', '$phone', '$hash' , 2)"); 
    $userInfo->execute();

     header("location: users.php");

   }

   function encrypt($pure_string, $encryption_key) {
    echo "string";
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

?> 