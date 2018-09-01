<?php
include 'registRequists.html' ;
include 'connection.php';

session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
}

$query = $conn->prepare("SELECT * FROM field");
$query->execute();
$result = $query->fetchall();

foreach($result as $row)
{
    $field_city = $row[5];
    $ownership = $conn->prepare("SELECT * FROM ownership WHERE $row[0] = field_id"); 
            $ownership->execute();
            $OwnerResult = $ownership->fetchall();
            foreach($OwnerResult as $ownerRow){
                $user = $conn->prepare("SELECT * FROM users WHERE $ownerRow[2] = user_id"); 
            $user->execute();
            $userResult = $user->fetchall();
            foreach($userResult as $userRow){
                $userName = $userRow[1] ;
                $userPhone = $userRow[2] ;

                $return = "";
    if ($row[9] == 0) {
        $return =
        $return . "<div class='w3-bar w3-row ' id='cardBlock'>
            <div class='w3-col s4 '>
                <div id='leftSide' class='w3-panel '></div>
            </div>
            <div class='w3-col s4 '>
                <div id='card' class='w3-card w3-panel w3-border '>
                    <div class='w3-bar w3-row'>
                        <div class='w3-col s4 '>
                            <div id='leftSide' class='w3-panel '></div>
                        </div>
                        <p id='requstText' style='text-align: right; font-size: 10pt;' class='w3-col s8'>
                            يطلب صاحب ميدان <b> $row[1] </b>  أن يتم تسجيل الميدان الخاص به في التطبيق
                        </p><br>
                        <div class='w3-col s10'>
                            <a class='collapsiblec feed indicac far fa' style='text-align: right; font-size: 14pt ; font-family: bold ; background-color: transparent;'>
                                التفاصيل </a>
                            </div>
                            <form  action='remove.php' method='post'>
                                <input name='name' value='$row[0]' hidden>
                                <input style='text-align: center; font-size: 12pt ; background:none!important; color:red; border:none; padding:0!important; cursor: pointer;' href=' id='reject' class='w3-link w3-col s1' name='reject' type='submit' value='رفض'>
                            </br>
                            <input style='text-align: center; font-size: 12pt ; color: green ; background:none!important; border:none;  padding:0!important;  cursor: pointer;' href=' id='confirm' class='w3-col s1' name='confirm' type='submit' value='قبول'>
                        </form>

                        
                    </div>
                    <div class='contentamen'>
                    <hr>
                        <div class='w3-row'>
                        <div class='w3-col s4' >
                        owner : $userName |
                        </div>
                        <div class='w3-col s8' >
                        phone : $userPhone
                        </div>
                        </div>
                        <div class='w3-row'>
                        <div class='w3-col s6' >
                        city : $field_city
                        </div>
                        </div>  
                        <hr> 
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

    
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    #inputt{
        padding: 10px ;
        display: block;
        height: 50px ;
        width: 100% ;
        color: #ccc ;
    }
    .collapsiblec{
        cursor:pointer;
    }
    .contentamen{
        padding: 0 18px ;
        max-height: 0 ;
        overflow : hidden;
        transition: max-height 0.2s ease-out ;
    }
</style>
<body>
    <script type="text/javascript">
            //collaps
            var coll = document.getElementsByClassName("feed");
            var i;
            var contt=0;
            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.parentNode.parentNode.nextElementSibling;
                    if (content.style.maxHeight){
                        content.style.maxHeight = null;

                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";

                    }
                });
            }
        </script>
    </body>
    </html>