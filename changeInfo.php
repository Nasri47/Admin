<?php
	include 'blockedUsers.html' ;
	include 'connection.php';

    session_start();

    if (!isset($_SESSION['login_user'])) {
    header('Location: index.php');
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Changing field informations
      $id = $_POST["name"];
      $fieldName = $_POST['fieldName'];
      $cityName =   $_POST['cityName'];
      $size = $_POST['size'];
      $open =   $_POST['open'];
      $close = $_POST['close'];
      $hourPrice =   $_POST['hourPrice'];

      if ($fieldName != "") {
          $sql = $conn->prepare("UPDATE `field` SET `field_name` = :name WHERE field_id = :id");
          $sql->bindParam(':name', $fieldName);
          $sql->bindParam(':id', $id);
          $sql->execute();
      }
      if ($cityName != "") {
          $sql = $conn->prepare("UPDATE `field` SET `field_city` = :city WHERE field_id = :id");
          $sql->bindParam(':city', $cityName);
          $sql->bindParam(':id', $id);
          $sql->execute();
      }
      if ($size != "") {
          $sql = $conn->prepare("UPDATE `field` SET `field_size` = :size WHERE field_id = :id");
          $sql->bindParam(':size', $size);
          $sql->bindParam(':id', $id);
          $sql->execute();
      }
      if ($open != "") {
          $sql = $conn->prepare("UPDATE `field` SET `open_time` = :open WHERE field_id = :id");
          $sql->bindParam(':open', $open);
          $sql->bindParam(':id', $id);
          $sql->execute();
      }
      if ($close != "") {
          $sql = $conn->prepare("UPDATE `field` SET `close_time` = :close WHERE field_id = :id");
          $sql->bindParam(':close', $close);
          $sql->bindParam(':id', $id);
          $sql->execute();
      }
      if ($hourPrice != "") {
        echo "string";
          $sql = $conn->prepare("UPDATE `field` SET `field_hour_price` = :price WHERE field_id = :id");
          $sql->bindParam(':price', $hourPrice);
          $sql->bindParam(':id', $id);
          $sql->execute();
      }

      echo "

                <form action='fieldProfile.php' method='post' hidden>
                            <input name='name' value='$id' hidden>
                            <input class='w3-bar-item w3-button w3-padding-16 w3-col s2 w3-center' value='complaints' name='complaints' type='submit' id='autoForm' onclick='return true;' hidden>
                </form>

                    <script type='text/javascript'>
                        var e = document.getElementById('autoForm');  e.form.submit();
                    </script>

           ";
      
      //header("Refresh:0 ; url=fieldProfile.php");



      }

?>