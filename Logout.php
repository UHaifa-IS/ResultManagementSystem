<html>
<body>

 <?php
 session_start();
 unset($_SESSION['counter']);
 unset($_SESSION["uname"]);
 $_SESSION = array();
session_destroy();
 header("Location:index.php");
  ?>

</body>
</html>
