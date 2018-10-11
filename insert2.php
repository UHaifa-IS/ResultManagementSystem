<?php
 $connect = mysqli_connect("localhost", "root", "", "resultmanagmentsystem");
 $sq="SELECT id from manageproject where 	ProjectName='$_POST[strUser]'";
 $res=mysqli_query($connect,$sq);
 $res2=mysqli_fetch_array($res);
 $sql = "INSERT INTO managestudentproject(ProjectName,idofpro,StudentName, Information) VALUES('".$_POST["strUser"]."','".$res2["id"]."' ,'".$_POST["StudentName"]."', '".$_POST["Information"]."')";
 if(mysqli_query($connect, $sql))
 {
      echo 'Data Inserted';
 }
 ?>
