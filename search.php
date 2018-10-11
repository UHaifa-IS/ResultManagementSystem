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

             if(isset($_GET['delete']))//check if there is _GET with delete value
            {
                $delete = $_GET['delete'];
                delete_var($delete);//delete the variable
            }
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

  <p><h1><center>Manage dictionary</center> </h1></p>

                    <h5> search for variables: </h5>

                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                            <button name="submit"  class="btn btn-info" type="submit">
                                Search
                        </button>

</div>
                    </form>
<div align="right">
                    <form action="Main.php"  class="btn btn-secondary">

                  <input type="submit" value="back" class="btn btn-info"/>
              </form>
              </div>

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

                        <table class = "table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                    <th>FileName</th>
                                    <th>Tags</th>
                                    <th>Abbreviation</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php   while($row = mysqli_fetch_assoc($result)){
                            $ID = $row['Id'];
                            $Name = $row['Name'];

                            $filename=$row['FileName'];

                            $Tags = $row['Tags'];
                            $Abbreviation = $row['Abbreviation'];



                         echo   "     <tr>

                                    <td>{$ID}</td>
                                    <td>{$Name}</td>

                                    <td>{$filename}</td>
                                    <td>{$Tags}</td>
                                    <td>{$Abbreviation}</td>
                                    <td><a href='edit_var.php?Id={$ID}'>Edit</a></td>
                                    <td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='search.php?delete={$ID}'>Delete</a></td>



                                </tr>";

                        }}} else {






               if(isset($_GET['user'])){
                    $search = $_GET['user'];
                    $query = "SELECT * FROM varfile WHERE Tags LIKE  Name = '%$search%'";// search for words that are like the var that we are passing
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

                    <h1>This variables are similar to the variable you tried to create</h1>

                        <table class = "table table-bordered table-hover">

                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>FileName</th>
                                  <th>Tags</th>
                                  <th>Abbreviation</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php   while($row = mysqli_fetch_assoc($result)){
                             $ID = $row['Id'];
                             $Name = $row['Name'];
                             $filename=$row['FileName'];
                             $Role = $row['Role'];
                             $Tags = $row['Tags'];
                             $Abbreviation = $row['Abbreviation'];



                         echo   "     <tr>

                         <td>{$ID}</td>
                         <td>{$Name}</td>

                         <td>{$filename}</td>
                         <td>{$Tags}</td>
                         <td>{$Abbreviation}</td>
                         <td><a href='edit_var.php?ID={$ID}'>Edit</a></td>
                         <td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='search.php?delete={$ID}'>Delete</a></td>



                                </tr>";

                        }}}} ?>
                            </tbody>
                        </table>


</body>
</html>
