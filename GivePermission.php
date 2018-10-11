<?php


// Create connection
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

$sql = "SELECT * FROM   users";

$records=mysqli_query($conn,$sql);
?>
<html>
<head>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <style type="text/css">
  body{
    background-image: url(https://png.pngtree.com/thumb_back/fw800/back_pic/00/10/71/125634e0552ca41.jpg);
    background-size:137%;
  }

  </style>
</head>
<body>
  <p><h1><center>Manage Permessions</center> </h1></p>
  <br><br><br>
  <p><h4><center>Level 1  -  The use can union variables.</center>
    <br><center>
  Level 2  -  The user can manage students and projects schedules.</center></h4></p>
  <br><br><br>
  <div align="center">
  <table width="600" border="1" cellpaddin="1" cellspacing="1">
    <tr>
      <th>UserName</th>
      <th>Permission Level</th>
<th>Remove User</th>
    <tr>
    <?php
    while($row=mysqli_fetch_array($records)){
      if($row['role'] == 'student1')
      {
      echo "<tr>";
      echo "<td>".$row['Name']."</td>";?>
<?php $name=$row['Name'];?>
      <?php echo "<td>" ?><a href="Handlingpermission.php?Name=<?php echo  $name ?> ">Level 1 --> Level 2 </a>
        <?php echo "<td>" ?><a href="disconnect.php?Name=<?php echo $name ?> ">Remove </a>
    <?php "</td>";?>
    <?php  echo "</tr>";
}


}
?>
<?php
$sql = "SELECT * FROM   users";

$records=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($records)){
  if($row['role'] == 'student2')
  {
  echo "<tr>";
  echo "<td>".$row['Name']."</td>";?>
<?php $name=$row['Name'];?>
  <?php echo "<td>" ?><a href="Handlingpermission.php?Name=<?php echo $name ?> ">Level 2 --> Level 1 </a>

<?php echo "<td>" ?><a href="disconnect.php?Name=<?php echo $name ?> ">Remove  </a>

          <?php "</td>";?>
<?php  echo "</tr>";
}


}
?>
  </table>
</div>
    <br><br>
    <form action="Main.php"  class="btn btn-secondary">
  <input type="submit" value="Back" class="btn btn-info"/>
</form>
</body>
</html>
