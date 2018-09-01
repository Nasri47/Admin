<?php
	include 'fields.php' ;
	include 'connection.php';

    session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

    $query = $_GET['query'];
            $sql = $conn->prepare("SELECT * FROM field WHERE field_name LIKE :name");
      $sql->bindValue(':name', '%' . $query . '%');
      $sql->execute();
      $result = $sql->fetchall();

          foreach ($result as $results) {
            if ($results[9] == 1) {
                 $ownership = $conn->prepare("SELECT * FROM ownership WHERE $results[0] = field_id"); 
            $ownership->execute();
            $OwnerResult = $ownership->fetchall();
            foreach($OwnerResult as $ownerRow){
                $user = $conn->prepare("SELECT * FROM users WHERE $ownerRow[2] = user_id"); 
            $user->execute();
            $userResult = $user->fetchall();
            foreach($userResult as $userRow){
                if ($userRow[4] ==  3) {
                    echo "<div class='w3-bar w3-row'>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel'></div>
                        </div>
                        <div class='w3-col s4' >
                <div id='card' style='padding:0px ; margin:8px; padding-right:16px' class='w3-card w3-border'>
                    <div class='w3-bar w3-row'>
                    <form action='fieldProfile.php' method='post'>
                            <input name='name' value='$results[0]' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='view profile' name='viewProfile' type='submit'>
                    </form>
                            <p id='requstText' style='text-align: right; font-size: 12pt; ' class='w3-col s9'>
                            ميدان $results[1]
                        <br><sub >$userRow[2]</sub></p><br>
                    </div>
                </div>
            </div>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel w3-center'>
                            </div>
                        </div>
                    </div>";
                }
            }
            }
            }
           
          }

          $sqlphone = $conn->prepare("SELECT * FROM users WHERE user_phone LIKE :phone");
      $sqlphone->bindValue(':phone', '%' . $query . '%');
      $sqlphone->execute();
      $resultPhone = $sqlphone->fetchall();

          foreach ($resultPhone as $results) {
            if ($results[4] ==  3) {
                $ownership = $conn->prepare("SELECT field_id FROM ownership WHERE user_id = :userId");
                  $ownership->bindParam(':userId' , $results[0]);
                  $ownership->execute();
                  $ownershipResult = $ownership->fetchall();
                  foreach ($ownershipResult as $ownerRow) {
                    $field = $conn->prepare("SELECT * FROM field WHERE field_id = :fieldId");
                  $field->bindParam(':fieldId' , $ownerRow[0]);
                  $field->execute();
                  $fieldResult = $field->fetchall();
                  foreach ($fieldResult as $fieldResult) {
                    if ($fieldResult[9] == 1) {
                        echo "<div class='w3-bar w3-row'>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel'></div>
                        </div>
                        <div class='w3-col s4' >
                <div id='card' style='padding:0px ; margin:8px; padding-right:16px' class='w3-card w3-border'>
                    <div class='w3-bar w3-row'>
                    <form action='fieldProfile.php' method='post'>
                            <input name='name' value='$fieldResult[0]' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='view profile' name='viewProfile' type='submit'>
                    </form>
                            <p id='requstText' style='text-align: right; font-size: 12pt; ' class='w3-col s9'>
                            ميدان $fieldResult[1]
                        <br><sub >$results[2]</sub></p><br>
                    </div>
                </div>
            </div>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel w3-center'>
                            </div>
                        </div>
                    </div>";
                    }
                  }
                  }

            }
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