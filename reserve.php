<?php

session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

$id = $_POST["name"];



   include 'connection.php';


  if(isset($_POST['reserves']))
  {
      $checkBox = $_POST['periods'];
      $username = $_POST['username']; 
      $userphone = $_POST['user_phone'];
      $userQuery = $conn->prepare("SELECT * FROM users"); 
      $userQuery->execute();
      $userResult = $userQuery->fetchall();
      $found = false ;

      foreach($userResult as $userRow)
      {
        //$userRow = mysqli_fetch_row($userResult);

        if ($userRow[2] == $userphone) {
            $found = true ;
            if ($userRow[4] != 1) {
            $startDate = date_create_from_format('H:i:s', $checkBox[0]);
                      $endDate = date_create_from_format('H:i:s', $checkBox[sizeof($checkBox)-1]);
                      $endDate = date_add($endDate, date_interval_create_from_date_string("+30 minutes"));
                      $startResult = $startDate->format('H:i:s');
                      $endResult = $endDate->format('H:i:s');
            $query = $conn->prepare("INSERT INTO reserve (field_id, user_id, reserve_beginning_time ,reserve_end_time)
              VALUES ('$id', '$userRow[0]' , '$startResult' , '$endResult')"); 
            $query->execute();
            
            echo "

              <form action='fieldProfile.php' method='post' hidden>
                            <input name='name' value='$id' hidden>
                            <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit' id='autoForm' onclick='return true;' hidden>
                </form>

                  <script type='text/javascript'>
                  var e = document.getElementById('autoForm');  e.form.submit();
                </script>

           ";
            }else{
              echo "

                    <div class='w3-bar w3-row'>
            <div class='w3-col s3'>
                <div id='leftSide' class='w3-panel'></div>
            </div>
            <div class='w3-col s6 '>
                <div id='card' class='w3-card w3-panel w3-border'>
                    <div class='w3-bar w3-row'>
                    <form action='block.php' method='post'>
                            <input name='name' value='' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='Block' name='block' type='submit'>
                    </form>
                        <div >
                            <p id='requstText' style='text-align: right; font-size: 14pt;' class='w3-col s9'>
                            Blocked
                        <br><sub>thier</sub></p><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class='w3-col s3 w3-center'>
                <div id='leftSide' class='w3-panel w3-center'>
                </div>
            </div>
        </div>
            " ;
            }
            
        }

      }

      if ($found == false) {

        $userInfo = $conn->prepare("INSERT INTO users (user_name, user_phone , user_pass , block_state)
              VALUES ('$username', '$userphone' , 0 , 0)"); 
        $userInfo->execute();

        //$userInfo = "INSERT INTO users (user_name, user_phone , block_state)
          //    VALUES ('$username', '$userphone' , 0)";
            //  mysqli_query($conn, $userInfo);

        $selectQ = $conn->prepare("SELECT * FROM users"); 
        $selectQ->execute();
        $userR = $selectQ->fetchall();
        /*
              $selectQ = "SELECT * FROM users";
              $userRes = mysqli_query($conn , $selectQ);
              $userR = mysqli_num_rows($userRes);
              */
              foreach($userR as $userRow)
              {
                  //$userRow = mysqli_fetch_row($userRes);

                  if ($userRow[2] == $userphone) {
                      $startDate = date_create_from_format('H:i:s', $checkBox[0]);
                      $endDate = date_create_from_format('H:i:s', $checkBox[sizeof($checkBox)-1]);
                      $endDate = date_add($endDate, date_interval_create_from_date_string("+30 minutes"));
                      $startResult = $startDate->format('H:i:s');
                      $endResult = $endDate->format('H:i:s');
                      $query = $conn->prepare("INSERT INTO reserve (field_id, user_id, reserve_beginning_time , reserve_end_time)
                        VALUES ('$id', '$userRow[0]' , '$startResult' , '$endResult')"); 
                      $query->execute();
                      //$query = "INSERT INTO reserve (field_id, user_id, reserve_beginning_time , reserve_end_time)
                        //VALUES ('$id', '$userRow[0]' , '$startResult' , '$endResult')";
                        //mysqli_query($conn, $query)or die (mysqli_error($conn));
                      
                  }

              }
      }

      echo "

              <form action='fieldProfile.php' method='post' hidden>
                            <input name='name' value='$id' hidden>
                            <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit' id='autoForm' onclick='return true;' hidden>
                </form>

                  <script type='text/javascript'>
                  var e = document.getElementById('autoForm');  e.form.submit();
                </script>

           ";
  }

  if(isset($_POST['cancleReserve']))
  {
      $reserveId = $_POST['reserveId'];
      $userQuery = $conn->prepare("UPDATE `reserve` SET `is_confirmd` = 2 WHERE `reserve`.`reserve_id` = $reserveId"); 
      $userQuery->execute();

      echo "

              <form action='fieldProfile.php' method='post' hidden>
                            <input name='name' value='$id' hidden>
                            <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit' id='autoForm' onclick='return true;' hidden>
                </form>

                  <script type='text/javascript'>
                  var e = document.getElementById('autoForm');  e.form.submit();
                </script>

           ";

      }

    
?>