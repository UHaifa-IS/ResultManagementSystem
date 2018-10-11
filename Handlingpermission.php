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
$query = "SELECT * FROM users WHERE Name='$_GET[Name]' ";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result))
{
  if($row['role'] == 'student1')
  {
  $sql = "UPDATE users SET role = 'student2' where  Name='$_GET[Name]' ";
  if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("you have update the student status")';
    echo '</script>';


  }
  header("Location: GivePermission.php");
}
else {
  $sql = "UPDATE users SET role = 'student1'  where  Name='$_GET[Name]'  ";
  if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("you have update the student status")';
    echo '</script>';


  }
    header("Location: GivePermission.php");
}
}
?>
