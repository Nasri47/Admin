<?php
	include 'users.html' ;
	include 'connection.php';

    session_start();
    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }
     $query = $conn->prepare("SELECT * FROM users"); 
     $query->execute();
     $result = $query->fetchall();
    foreach($result as $row)
    {
        
        $return = "";   
        if ($row[4] == 0) {
            $return =
            $return . "

                    <div class='w3-bar w3-row'>
            <div class='w3-col s4'>
                <div id='leftSide' class='w3-panel'></div>
            </div>
            <div class='w3-col s4 '>
                <div id='card' class='w3-card  w3-border'>
                    <div class='w3-bar w3-row'>
                    <button id='loginBt' onclick='openSuspend()' class='w3-button w3-teal w3-col s3'>Block</button>
                    <div id='suspend' class='w3-modal' >
                    <div class='w3-modal-content' style='width:30%'>
                      <div class='w3-container'>
                        <span onclick='closeSuspend();' class='w3-button w3-display-topright'>&times;</span>
                        <p id='login'>Suspend resones</p>
                        <form action='Block.php' method='post'>
                            <input name='name' value='$row[0]' hidden>
                            <textarea id='fieldInputs' class='w3-input' type='text' name = 'resons' placeholder='Enter Block resons'></textarea>
                            <input id='susBt' style='margin-bottom: 20px ;' class='w3-button w3-red' type='submit' value='Block' name='block' disabled>
                        </form>
                    </div>
                </div>
            </div>
                        <div >
                            <p id='requstText' style='text-align: right; font-size: 10pt;' class='w3-col s9'>
                            <b>$row[1]</b>
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

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<script type="text/javascript">
    function openSuspend(){
        document.getElementById('suspend').style.display='block' ;

    }
    function closeSuspend(){
        document.getElementById('suspend').style.display='none' ;
    }
    var suBt = document.getElementById('susBt') ;
        var fieldInputs = document.getElementById('fieldInputs') ;
    fieldInputs.onkeyup = function(){
        if (fieldInputs.value.length > 0) {
            suBt.disabled = false;
        }
         else {
            suBt.disabled = true;
         }
    }
</script>
</body>
</html>