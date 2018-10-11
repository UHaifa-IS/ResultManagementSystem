

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
  <br><br>
  <h5>hello <?php echo$_SESSION['login_user']; ?></h5>
  <h5>you had chosen this variables:</h5>
<?php
$query = "SELECT Name FROM variables WHERE hadchosen =1";
 $result = mysqli_query($conn,$query);?>

 <?php while($row=mysqli_fetch_array($result)) :;{?>


<h3><?php   echo $row["Name"]  ?></h3>
<?php
$doc_body ="
$row[Name]
";
?>
<?php }endwhile;?>



<?php

$query = "UPDATE variables SET  hadchosen=0 WHERE hadchosen =1";
 ?>




<h4>Do yo want to unioning them?</h4>
<br><br>
<ul>
  <li><form name="proposal_form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="submit" name="submit_docs" value="yes" class="input-button" />
</form>
</li>


<li>
<form action="Main.php">
  <input type="submit" value="No" />
</form>
</li>
<?php
  if(isset($_POST['submit_docs'])){
          header("Content-Type: application/vnd.msword");
          header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
          header("content-disposition: attachment;filename=sampleword.doc");
  }
          echo "<html>";
          echo "$doc_body";
          echo "</html>";
?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
