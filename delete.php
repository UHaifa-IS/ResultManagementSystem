<?php
 $connect = mysqli_connect("localhost", "root", "", "resultmanagmentsystem");
 $sql = "DELETE FROM manageproject WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $sql))
 {
      echo 'Data Deleted';
 }
 ?>
