<?php

session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

$id = $_POST["name"];



   include 'connection.php';

   $checkBox = $_POST['periods'];

  if(isset($_POST['confirm']))
  {
    echo "
    <link rel='stylesheet' href='css/main.css'>
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
    <div id='leftDiv' class='w3-container'></div>
    <div id='loginCard' class='w3-container'>
      <div id='card' class='w3-card w3-panel w3-border'>
        <p id='login'>Login</p>
        <form action='reserve.php' method='post'>
        <input name='name' value='$id' hidden>
          <input id='userInput' required='required' class='w3-input' type='text' name = 'username' placeholder='username'>
          <input id='userPass' required='required' class='w3-input' type='text' name = 'user_phone' placeholder='phone number'>
          <input id='loginBt' class='w3-button w3-teal' type='submit' value='submit' name='submit' >
        </form>
      </div>
    </div>";
  }
            
?>