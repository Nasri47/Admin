<?php

session_start();

if (!isset($_SESSION['login_user'])) {
  header('Location: index.php');
}
$id = $_POST["name"];
$field_id = $_POST["field_id"];

include 'connection.php';
if (isset($_POST['delete'])) {
  $query = $conn->prepare("UPDATE `complaint` SET `del_comp` = 1 WHERE `complaint`.`complaint_id` = $id"); 
  $query->execute();
}
if (isset($_POST['send'])) {
  $query = $conn->prepare("UPDATE `complaint` SET `aprove` = 1 WHERE `complaint`.`complaint_id` = $id");  
  $query->execute(); 
}


echo "

<form action='complaints.php' method='post' hidden>
  <input name='name' value='$field_id' hidden>
  <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit' id='autoForm' onclick='return true;' hidden>
</form>

<script type='text/javascript'>
 var e = document.getElementById('autoForm');  e.form.submit();
</script>

";

?>