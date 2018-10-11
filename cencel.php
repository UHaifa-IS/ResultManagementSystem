<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultManagmentSystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php

if(isset($_POST['cencel']))
{
$update_query = "UPDATE varfile SET 	hadchosen = 0 WHERE hadchosen=1";
 if(mysqli_query($conn, $update_query))
    	header("Location:Main.php");
}
?>
