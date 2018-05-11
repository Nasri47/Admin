<?php

echo "string";
   if (isset($_POST['reject']))
        {
           header("location: fields.php");
        } elseif (isset($_POST['confirm'])) {
            header("location: fields.php");
        }
?>