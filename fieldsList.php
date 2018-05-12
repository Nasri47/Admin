<?php
	include 'fields.php' ;
	include 'connection.php';

     $query = "SELECT * FROM users";
     $result = mysqli_query($conn , $query);

     if(!$result) die("Oh crap...: " . mysql_error());
     
     $rows = mysqli_num_rows($result);

    for ($j = 1 ; $j <= $rows; $j++)
    {
        $return = "";   
        $row = mysqli_fetch_row($result);
            $return =
            $return . "

                    <div class='w3-bar w3-row'>
                        <div class='w3-col s3'>
                            <div id='leftSide' class='w3-panel '></div>
                        </div>
                        <div class='w3-col s6' >
                <div id='card' class='w3-card w3-panel w3-border'>
                    <div class='w3-bar w3-row'>
                    <div class='w3-col s3'>
                            <button id='loginBt' class='w3-button w3-teal'>view profile</button>
                        </div>  
                        <div class='w3-col s9'>
                            <p id='requstText' style='text-align: right; font-size: 14pt;'>
                            ميدان $row[1]
                        <br><sub>$row[2]</sub></p><br>
                        </div>
                    </div>
                </div>
            </div>
                        <div class='w3-col s3'>
                            <div id='leftSide' class='w3-panel w3-center'>
                            </div>
                        </div>
                    </div>
            " ;        
    echo  $return;
}

?>