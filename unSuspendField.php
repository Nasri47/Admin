<?php

session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

$id = $_POST["name"];
   include 'connection.php';
   if (isset($_POST['unsuspend']))
        {
            $query = $conn->prepare("UPDATE `field` SET `block_state` = 1 WHERE `field`.`field_id` = $id");
          $resQuery = $conn->prepare("UPDATE `field` SET `suspend_resons` = '' WHERE `field`.`field_id` = $id"); 
        $query->execute();
        $resQuery->execute();
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