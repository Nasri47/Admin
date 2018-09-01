<?php
include 'complaints.html' ;
include 'connection.php';

session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
}


$id = $_POST["name"];



echo "<div class='w3-bar w3-border w3-row' style='background-color: #C0C0C0'>
<div class='w3-col s3 w3-center'>
    <a href='#' class='w3-bar-item w3-button w3-padding-16 '>Icon</a>
</div>
<form action='fieldProfile.php' method='post'>
    <input name='name' value='$id' hidden>
    <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='Home' name='viewProfile' type='submit'>
</form>

<form action='reserveRequest.php' method='post'>
    <input name='name' value='$id' hidden>
    <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='reservations' name='reservations' type='submit'>
</form>

<form action='complaints.php' method='post'>
    <input name='name' value='$id' hidden>
    <input class='w3-bar-item w3-button  w3-white w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit'>
</form>
<div class='w3-col s2 w3-center'>
    <div id='leftSide' class='w3-panel w3-center'>
    </div>
</div>
</div>";  

$query = $conn->prepare("SELECT * FROM complaint"); 
$query->execute();
$result = $query->fetchall();

foreach($result as $row)
{
    $aproved = $row[5] ;
    $return = "";
    if ($row[1] == $id && $row[4] == 0 ) {
        $userSelect = $conn->prepare("SELECT users.user_name , users.user_phone FROM users WHERE user_id = '$row[2]'"); 
        $userSelect->execute();
        $userResult = $userSelect->fetchall();

        foreach($userResult as $userrow)
        {
            if ($aproved == 0) {
                $return = 
                $return . "
                <div class='w3-bar w3-row ' id='cardBlock'>

                    <div class='w3-col s3 '>
                        <div id='leftSide' class='w3-panel '></div>
                    </div>

                    <div class='w3-col s6'>
                        <div id='card' class='w3-card w3-panel w3-border '>
                            <div class='w3-bar w3-row'>
                                <p id='requstText' style='text-align: right; font-size: 12pt;' class='w3-col s9 w3-right'>
                                 <b> $userrow[0] </b>
                                 <br><sub> $userrow[1] </sub></p><br>
                             </div>
                             <div class='w3-bar w3-row'>
                                <p id='requstText' style='text-align: right; font-size: 12pt; word-wrap: break-word ;' class='w3-col s12'>
                                    $row[3]
                                </p>
                            </div>
                            <div class='w3-bar w3-row'>
                                <form action='delCom.php' method='post'>
                                    <input name='name' value='$row[0]' hidden>
                                    <input name='field_id' value='$id' hidden>
                                    <input style='text-align: center; font-size: 14pt ; background:none!important; color:red; border:none; padding:0!important; cursor: pointer;' href=' id='reject' class='w3-link w3-col s1 w3-right' name='delete' type='submit' value='حذف'>
                                    <input style='text-align: center; font-size: 14pt ; background:none!important; color:blue; border:none; padding:0!important; cursor: pointer;' href=' id='reject' class='w3-link w3-col s1 w3-right' name='send' type='submit' value='ارسال'>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='w3-col s3 '>
                        <div id='leftSide' class='w3-panel '></div>
                    </div>
                </div>
                
                " ;

            }elseif ($aproved == 1) {
                $return = 
                $return . "
                <div class='w3-bar w3-row ' id='cardBlock'>

                    <div class='w3-col s3 '>
                        <div id='leftSide' class='w3-panel '></div>
                    </div>

                    <div class='w3-col s6'>
                        <div id='card' class='w3-card w3-panel w3-border '>
                            <div class='w3-bar w3-row'>
                                <p id='requstText' style='text-align: right; font-size: 12pt;' class='w3-col s9 w3-right'>
                                 <b> $userrow[0] </b>
                                 <br><sub> $userrow[1] </sub></p><br>
                             </div>
                             <div class='w3-bar w3-row'>
                                <p id='requstText' style='text-align: right; font-size: 12pt; word-wrap: break-word ;' class='w3-col s12'>
                                    $row[3]
                                </p>
                            </div>
                            <div class='w3-bar w3-row'>
                                <form action='delCom.php' method='post'>
                                    <input name='name' value='$row[0]' hidden>
                                    <input name='field_id' value='$id' hidden>
                                    <input style='text-align: center; font-size: 14pt ; background:none!important; color:red; border:none; padding:0!important; cursor: pointer;' href=' id='reject' class='w3-link w3-col s1 w3-right' name='delete' type='submit' value='حذف'>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='w3-col s3 '>
                        <div id='leftSide' class='w3-panel '></div>
                    </div>
                </div>
                
                " ;
            }
        }

    }
    

    
    echo  $return;
}

?>