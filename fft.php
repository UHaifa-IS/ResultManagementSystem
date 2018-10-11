<?php
 session_start();
$messageto=array();
$messagetext=array();
$messagefrom=array();

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ResultManagmentSystem";

if(isset($_POST['view'])){
  $con = new mysqli($servername, $username, $password, $dbname);


$query = "SELECT * FROM noti WHERE username='$_SESSION[login_user]' AND status=0 ORDER BY id DESC LIMIT 5 ";
$result = mysqli_query($con, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
   <li>
    <a href="view.php?id=  '.$row["id"].' ">
  <small><em>'.$row["notification"].'</em></small>
    </a>
  </li>
<li class="divider"></li>
   ';

}
}

else{
    $output .= '<li>  <a href="#" class="text-bold text-italic">No Messages Found</a></li>';
}



 $status_query = "SELECT * FROM noti WHERE username='$_SESSION[login_user]' AND status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

 $data = array(
   'messages' => $output,
   'unseen_messages'  => $count
);

echo json_encode($data);
}
?>
