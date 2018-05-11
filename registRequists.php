<?php
	include 'registRequists.html' ;
	include 'connection.php';

     $query = "SELECT * FROM fields";
     $result = mysqli_query($conn , $query);

     if(!$result) die("Oh crap...: " . mysql_error());
     
     $rows = mysqli_num_rows($result);
     $butArray = array();


    for ($j = 1 ; $j <= $rows; $j++)
    {
        $return = "";   
        $row = mysqli_fetch_row($result);
        if ($row[4] == null) {
            $return = 
            $return . "

<div class='w3-bar w3-row ' id='cardBlock'>
                <div class='w3-col s3 '>
                    <div id='leftSide' class='w3-panel '></div>
                </div>
                <div class='w3-col s6 '>
                    <div id='card' class='w3-card w3-panel w3-border '>
                        <div class='w3-bar w3-row'>
                            <div class='w3-col s4 '>
                                <div id='leftSide' class='w3-panel '></div>
                            </div>
                            <p id='requstText' style='text-align: right; font-size: 16pt;' class='w3-col s8'>
                                يطلب صاحب ميدان  $row[1]  أن يتم تسجيل الميدان الخاص به في التطبيق
                            </p><br>
                            <div class='w3-col s10'>
                                <a style='text-align: right; font-size: 14pt ; font-family: bold ; background-color: transparent;' href='#' class='w3-dropdown-hover'>
                                التفاصيل
                                    <div class='w3-dropdown-content w3-card-4' style='width:250px'>
                                        <div class='w3-container'>
                                          <p>London is the capital city of England.</p>
                                          <p>It is the most populous city in the UK.</p>
                                        </div>
                                      </div>
                                </a>
                            </div>
                            <form  action='remove.php' method='post'>
                            <input name='name' value='$row[0]' hidden>
                            <input style='text-align: center; font-size: 14pt ; background:none!important; color:red; border:none; padding:0!important; cursor: pointer;' href=' id='reject' class='w3-link w3-col s1' name='reject' type='submit' value='رفض'>
                                </br>
                            <input style='text-align: center; font-size: 14pt ; color: green ; background:none!important; border:none;  padding:0!important;  cursor: pointer;' href=' id='confirm' class='w3-col s1' name='confirm' type='submit' value='قبول'>
                            </form>
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
        
    echo  $return;
}

?>