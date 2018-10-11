<?php

 include "db.php";
 include "functions.php";
 // confirm connection
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

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
  body{
    background-image: url(https://png.pngtree.com/thumb_back/fw800/back_pic/00/10/71/125634e0552ca41.jpg);
    background-size:2000%;
  }
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


</style>
</head>
<body>
      <?php
               if(isset($_POST['submit'])){
                    $search = $_POST['search'];
                    $query = "SELECT * FROM varfile WHERE Tags LIKE '%".$search."%'
  OR 	Name LIKE '%".$search."%'
  OR 	Abbreviation LIKE '%".$search."%'
 ";
   $result = mysqli_query($conn,$query);
                  if(!$result) {
                          die ("no data" . mysqli_error($conn));
                  }

                   $count = mysqli_num_rows($result);// count the number of rows in the returned query
                   if($count == 0 ){
                       echo "<h1>No Result</h1>";
                   }
                   else {
                   	?>
<form method="POST">
                        <table class = "table table-bordered table-hover">

                            <thead>
                                <tr>
                                  <tr>
                                     <th><input type="submit" value="choose" name="choose"  ></th>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>FileName</th>
                                      <th>Tags</th>
                                      <th>Synonym</th>

                                  </tr>
                            </thead>

                            <input type="submit" value="back" name="back" />

                            <?php
                             while($row = mysqli_fetch_assoc($result)) :;{?>
                              <tr>
                                <td><input type="checkbox" name="language[]" value="<?php echo $row["Id"] ?>"></td>
                            <td><?php echo $row['Id'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td><a href="files/<?php echo $row['FileName']?>"><?php echo $row['FileName'] ?></a></td>

                            <td><?php echo $row['Tags'] ?></td>
                            <td><?php echo $row['Abbreviation'] ?></td>

                            </tr>




                            <?php }endwhile;
                              }}?>
  </table>
                            </form>
                            <?php
                                    if(isset($_POST["choose"]))
                                    {
                                     $for_query = '';
                                     if(!empty($_POST["language"]))
                                     {
                                      foreach($_POST["language"] as $language)
                                      {
                                       $for_query .= $language . ', ';
                                      }
                                      $for_query = substr($for_query, 0, -2);
                                      $query = "UPDATE varfile SET  hadchosen=1 where Id in ($for_query)";
                                      if(mysqli_query($conn, $query))
                                      {
                                        $query1 = "SELECT * FROM varfile WHERE  hadchosen=1 ";
                                        $records=mysqli_query($conn,$query1);

                                     // while($row1 = mysqli_fetch_array($records)){
                                     //       if($row1["Abbreviation"]!=null )
                                     //       {
                                     //         $query2 = "SELECT * FROM varfile  ";
                                     //         $records2=mysqli_query($conn,$query2);
                                     //          while($row2 = mysqli_fetch_array($records2))
                                     //          {
                                     //            if($row2["Name"]==$row1["Abbreviation"])
                                     //            {
                                     //              $update_query = "UPDATE varfile SET 	hadchosen = 1 WHERE Name='$row1[Abbreviation]' ";
                                     //              mysqli_query($conn, $update_query);
                                     //
                                     //            }
                                     //          }
                                     //
                                     //       }
                                     //
                                     // }
                                     echo '<script language="javascript">';
                                     echo 'alert("you have selected the variables")';
                                     echo '</script>';
                                     header("Location:createnewexcel.php");
                                   }




                                     else
                                     {
                                      echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
                                     }
                                   }
                                   }

                                   if(isset($_POST["back"]))
                                   {
                                    $for_query = '';
                                    if(!empty($_POST["language"]))
                                    {
                                     foreach($_POST["language"] as $language)
                                     {
                                      $for_query .= $language . ', ';
                                     }
                                     $for_query = substr($for_query, 0, -2);
                                     $query = "UPDATE varfile SET  hadchosen=1 where Id in ($for_query)";
                                     if(mysqli_query($conn, $query))
                                     {
                                       $query1 = "SELECT * FROM varfile WHERE  hadchosen=1 ";
                                       $records=mysqli_query($conn,$query1);

                                    // while($row1 = mysqli_fetch_array($records)){
                                    //       if($row1["Abbreviation"]!=null )
                                    //       {
                                    //         $query2 = "SELECT * FROM varfile  ";
                                    //         $records2=mysqli_query($conn,$query2);
                                    //          while($row2 = mysqli_fetch_array($records2))
                                    //          {
                                    //            if($row2["Name"]==$row1["Abbreviation"])
                                    //            {
                                    //              $update_query = "UPDATE varfile SET 	hadchosen = 1 WHERE Name='$row1[Abbreviation]' ";
                                    //              mysqli_query($conn, $update_query);
                                    //
                                    //            }
                                    //          }
                                    //
                                    //       }
                                    //
                                    // }

                                  }




                                    else
                                    {
                                     echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
                                    }
                                  }
                                  echo '<script language="javascript">';
                                  echo 'alert("you have selected the variables")';
                                  echo '</script>';
                                  header("Location:unioningvariablesstep1.php");
                                  }

  ?>





</body>
</html>
