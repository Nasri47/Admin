<?php
	include 'BlockUsers.html' ;
	include 'connection.php';

    session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

    $query = $_GET['query'];
            $sql = $conn->prepare("SELECT * FROM users WHERE user_name LIKE :name AND block_state = 1");
      $sql->bindValue(':name', '%' . $query . '%');
      $sql->execute();
      $result = $sql->fetchall();

      $sqlphone = $conn->prepare("SELECT * FROM users WHERE user_phone LIKE :phone AND block_state = 1");
      $sqlphone->bindValue(':phone', '%' . $query . '%');
      $sqlphone->execute();
      $resultPhone = $sqlphone->fetchall();

          foreach ($result as $results) {
            echo "<div class='w3-bar w3-row'>
            <div class='w3-col s4'>
                <div id='leftSide' class='w3-panel'></div>
            </div>
            <div class='w3-col s4 '>
                <div id='card' class='w3-card  w3-border'>
                    <div class='w3-bar w3-row'>
                    <form action='block.php' method='post'>
                            <input name='name' value='$results[0]' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='Block' name='block' type='submit'>
                    </form>
                        <div >
                            <p id='requstText' style='text-align: right; font-size: 10pt;' class='w3-col s9'>
                            $results[1]
                        <br><sub>$results[2]</sub></p><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class='w3-col s4 w3-center'>
                <div id='leftSide' class='w3-panel w3-center'>
                </div>
            </div>
        </div>";
          }

          foreach ($resultPhone as $results) {
            echo "<div class='w3-bar w3-row'>
            <div class='w3-col s4'>
                <div id='leftSide' class='w3-panel'></div>
            </div>
            <div class='w3-col s4 '>
                <div id='card' class='w3-card  w3-border'>
                    <div class='w3-bar w3-row'>
                    <form action='block.php' method='post'>
                            <input name='name' value='$results[0]' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='Block' name='block' type='submit'>
                    </form>
                        <div >
                            <p id='requstText' style='text-align: right; font-size: 10pt;' class='w3-col s9'>
                            $results[1]
                        <br><sub>$results[2]</sub></p><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class='w3-col s4 w3-center'>
                <div id='leftSide' class='w3-panel w3-center'>
                </div>
            </div>
        </div>";
          }

          if ($sqlphone->fetchColumn() == 0 && $sql->fetchColumn() == 0) {
              echo "<div class='w3-bar w3-row'>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel'></div>
                        </div>
                        <div class='w3-col s4' >
                <div id='card' style='padding:0px ; margin:8px; padding-right:16px' class=''>
                    <div class='w3-bar w3-row'>
                    
                            <p id='requstText' style='text-align: right; font-size: 12pt; ' class='w3-col s8'>
                            No suspended fields fond !
                    </div>
                </div>
            </div>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel w3-center'>
                            </div>
                        </div>
                    </div>
            ";
          }
    
             
?>