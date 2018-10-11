



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

<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 <style type="text/css">
 body{
   background-image: url(https://png.pngtree.com/thumb_back/fw800/back_pic/00/10/71/125634e0552ca41.jpg);
   background-size:137%;
 }


 li{
   display: inline-block;
   padding-left: 20px;
 }
 </style>

</head>


<body>

<?php
$update_query = "SELECT *  FROM  noti WHERE status=0 And id=$_GET[id]";
 $records=mysqli_query($conn, $update_query);?>
  <?php while($row1 = mysqli_fetch_array($records)){?>
 <?php $mess=$row1['message'];
       $sender=$row1['sender'];
 ?>
  <h1>New User</h1>
<br><br>
 <?php echo $mess; ?>

<?php
$update_query = "UPDATE noti SET status = 1 WHERE 	 id=$_GET[id] AND status=0";
 mysqli_query($conn, $update_query);
?>

<br><br>
<ul>
  <li><a href="addstudentwithpermission1.php?sender=<?php echo $sender ?>  ">Accept</a>
</li>
<li>
  <li><a href="ignorerequest.php?sender=<?php echo $sender ?>">Reject</a>


</li>
<?php }?>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
