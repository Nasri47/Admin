<?php
	include 'blockUsers.html' ;
	include 'connection.php';

    session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

    $query = $conn->prepare("SELECT * FROM users"); 
    $query->execute();
    $result = $query->fetchall();

    foreach($result as $row){
        
        $return = "";   
        if ($row[4] == 1) {

            $return =
            $return . "

                    <div class='w3-bar w3-row'>
            <div class='w3-col s4'>
                <div id='leftSide' class='w3-panel '></div>
            </div>
            <div class='w3-col s4 '>
                <div id='card' class='w3-card w3-border '>
                    <div class='w3-bar w3-row'>
                    <form  action='unblock.php' method='post'>
                            <input name='name' value='$row[0]' hidden>
                            <input id='loginBt' class='w3-button w3-teal w3-col s3' value='Unblock' name='unBlock' type='submit'>
                    </form>
                        <div >
                            <p id='requstText' style='text-align: right; font-size: 10pt;' class='w3-col s9'>
                            $row[1]
                        <br><sub>$row[2]</sub></p><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class='w3-col s4 w3-center'>
                <div id='leftSide' class='w3-panel w3-center'>
                </div>
            </div>
        </div>
            " ;

                }

        echo  $return;
}

?>