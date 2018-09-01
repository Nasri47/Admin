<?php
	include 'fieldsSuspended.php' ;
	include 'connection.php';

    session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }
     $query = $conn->prepare("SELECT * FROM field"); 
     $query->execute();
     $result = $query->fetchall();

     echo "<div class='w3-bar w3-row'>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel'></div>
                        </div>
                        <div class='w3-col s4' >
                <div id='card' style='padding:0px ; margin:8px; padding-right:16px' class=' w3-border'>
                    <div class='w3-bar w3-row'>
                    
                            <p id='requstText' style='text-align: right; font-size: 12pt; ' class='w3-col s8'>
                            Suspended Fields
                    </div>
                </div>
            </div>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel w3-center'>
                            </div>
                        </div>
                    </div>
            ";

    foreach($result as $row)
    {
        $return = "";   

        if ($row['block_state'] == 2) {
            $ownership = $conn->prepare("SELECT * FROM ownership WHERE $row[0] = field_id"); 
            $ownership->execute();
            $OwnerResult = $ownership->fetchall();
            foreach($OwnerResult as $ownerRow){
                $user = $conn->prepare("SELECT * FROM users WHERE $ownerRow[2] = user_id"); 
            $user->execute();
            $userResult = $user->fetchall();
            foreach($userResult as $userRow){
                    $return =
            $return . "
                    <div class='w3-bar w3-row'>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel'></div>
                        </div>
                        <div class='w3-col s4' >
                <div id='card' style='padding:0px ; margin:8px; padding-right:16px' class='w3-card w3-border'>
                    <div class='w3-bar w3-row'>
                    <form action='fieldProfile.php' method='post'>
                            <input name='name' value='$row[0]' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='view profile' name='viewProfile' type='submit'>
                    </form>
                            <p id='requstText' style='text-align: right; font-size: 12pt; ' class='w3-col s9'>
                            ميدان $row[1]
                        <br><sub >$userRow[2]</sub></p><br>
                    </div>
                </div>
            </div>
                        <div class='w3-col s4'>
                            <div id='leftSide' class='w3-panel w3-center'>
                            </div>
                        </div>
                    </div>
            " ; 
            }  
            }
            
            }     
    echo  $return;
}

?>