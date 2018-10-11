<?php
session_start();

if (!(isset($_SESSION['login_user']))){
    header("Location: index.php");}





     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "resultmanagmentsystem";

     // Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     // Check connection
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }

  ?>



<?php

  $sql = "DELETE FROM  users  where  Name='$_GET[Name]' ";
  if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("you have update the student status")';
    echo '</script>';


  }
  header("Location: GivePermission.php");


?>
