<?php
$connect = mysqli_connect("localhost", "root", "", "resultmanagmentsystem");
if(isset($_POST["ProjectName"], $_POST["Information"]))
{
 $ProjectName = mysqli_real_escape_string($connect, $_POST["ProjectName"]);
 $information = mysqli_real_escape_string($connect, $_POST["Information"]);
 print_r( $ProjectName);
 $query = "INSERT INTO manageproject(ProjectName, Information) VALUES('$ProjectName', '$information')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
