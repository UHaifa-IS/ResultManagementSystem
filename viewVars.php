
<?php

 include "db.php";
 include "functions.php";

             if(isset($_GET['delete']))//check if there is _GET with delete value
            {
                $delete = $_GET['delete'];
                delete_var($delete);//delete the variable
            }             if(isset($_GET['delete']))//check if there is _GET with delete value

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
  <p><h1><center>Manage Dictionary</center> </h1></p>

                    <h5> Search For Variables: </h5>

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

                  <input type="submit" value="Back" class="btn btn-info"/>
              </form>
              </div>

                    <!-- search form -->
                    <!-- /.input-group -->


  <!-- /insert button -->
<!-- <form action="InsertForm.php">
    <input type="submit" value="Add var" />
</form> -->




                        <table class = "table table-bordered table-hover">

                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>FileName</th>
                                    <th>Tags</th>
                                    <th>Synonym</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php sel_vars_table(); ?>
                            </tbody>
                        </table>


</body>
</html>
