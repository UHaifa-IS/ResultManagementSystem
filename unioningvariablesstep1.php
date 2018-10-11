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


 // $query = "SELECT * FROM varfile ORDER BY  ID DESC";
 // $result = mysqli_query($conn,$query);
 // while($row=mysqli_fetch_array($result))
 // {
 //   $tag=$row['Tags'];
 //   $filename=$row['FileName'];
 //   while($row=mysqli_fetch_array($result))
 //   {
 //     if($tag==$row['Name'] && $filename==$row['FileName'] )
 //     {
 //     $sql = "DELETE FROM varfile WHERE Name = '".$row['Name']."'"
 //     mysqli_query($connect, $sql);
 //    }
 //   }
 // }

?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
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

  <p><h1><center>Unioning Variables</center> </h1></p>
  <h5> Search For Variables: </h5>

  <form action="search2.php" method="post">
  <div class="input-group">
      <input name="search" type="text" class="form-control">
          <button name="submit"  class="btn btn-info" type="submit">
              Search
      </button>

</div>
  </form>
<div align="right">
  <form action="Main.php"  class="btn btn-secondary">

<input type="submit" value="Back" class="btn btn-info"/>
</form>
</div>





<form method="POST">
                        <table class = "table table-bordered table-hover">

                            <thead>
                                <tr>
                                   <th><input type="submit" value="choose" name="choose"  ></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>FileName</th>
                                    <th>Tags</th>
                                    <th>Synonym</th>

                                </tr>
                            </thead>

<?php
$query = "SELECT * FROM varfile ORDER BY  ID DESC";
$result = mysqli_query($conn,$query);
?>
<?php
  while($row=mysqli_fetch_array($result)) :;{?>
  <tr>
    <td><input type="checkbox" name="language[]" value="<?php echo $row["Id"] ?>"></td>
<td><?php echo $row['Id'] ?></td>
<td><?php echo $row['Name'] ?></td>
<td><a href="files/<?php echo $row['FileName']?>"><?php echo $row['FileName'] ?></a></td>

<td><?php echo $row['Tags'] ?></td>
<td><?php echo $row['Abbreviation'] ?></td>

</tr>




<?php }endwhile;?>
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

         while($row1 = mysqli_fetch_array($records)){
               if($row1["Abbreviation"]!=null )
               {
                 $query2 = "SELECT * FROM varfile  ";
                 $records2=mysqli_query($conn,$query2);
                  while($row2 = mysqli_fetch_array($records2))
                  {
                    if($row2["Name"]==$row1["Abbreviation"])
                    {
                      $update_query = "UPDATE varfile SET 	hadchosen = 1 WHERE Name='$row1[Abbreviation]' ";
                      mysqli_query($conn, $update_query);

                    }
                  }

               }

         }
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
        ?>


</body>
</html>
