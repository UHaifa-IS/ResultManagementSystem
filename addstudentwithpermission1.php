<?php
 session_start();
$messageto=array();
$messagetext=array();
$messagefrom=array();

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ResultManagmentSystem";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$update_query = "UPDATE users SET role = 'student1' WHERE Name='$_GET[sender]'";
if(mysqli_query($conn, $update_query))
{
  header("Location:Main.php");
}


?>
