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
$sql = "SELECT Name FROM users WHERE Name = '$_POST[fname]'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);
$st="Student";
if($count == 0) {
  $sql="INSERT INTO users (Name, Gmail, phoneNumber, Password, role)VALUES
  ('$_POST[fname]','$_POST[lEmail]','$_POST[phone]','$_POST[pass]','$st')";

     if ($conn->query($sql) === TRUE) {

       echo ("<SCRIPT LANGUAGE='JavaScript'>

         window.alert('Succesfully Registered,Login Please.')
location.href = 'index.php';
         </SCRIPT>");

  }
}
else {

         echo ("<SCRIPT LANGUAGE='JavaScript'>

           window.alert('UserName existed')
  location.href = 'index.php';
           </SCRIPT>");

}

$conn->close();
?>
