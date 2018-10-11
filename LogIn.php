<?php
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


   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['fname']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pass']);


      $sql = "SELECT Name FROM users WHERE Name = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);


      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location:Main.php");
      }
      else {
         header("location: index.php");
      }
   }
?>
