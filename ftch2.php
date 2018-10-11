<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "resultmanagmentsystem";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
  $request=$_POST['request'];
  $sq="select id from manageproject  where 	ProjectName='$request'";
  $res=mysqli_query($connect,$sq);


 $output = '';
?>

<?php

 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th width="10%">Id</th>
                     <th width="40%">StudentName</th>
                     <th width="40%">Information</th>
                     <th width="10%">Delete/Add</th>
                </tr>';
                if(mysqli_num_rows($res) > 0)
                {
                while($ro = mysqli_fetch_array($res))
                {
                  $sql="SELECT * FROM  managestudentproject  where idofpro = $ro[id]";
                  $result=mysqli_query($connect,$sql);

      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr>
                     <td>'.$row["id"].'</td>
                     <td class="StudentName" data-id1="'.$row["id"].'" contenteditable>'.$row["StudentName"].'</td>
                     <td class="Information" data-id2="'.$row["id"].'" contenteditable>'.$row["Information"].'</td>
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                </tr>
           ';
      }
    }
      $output .= '
           <tr>
                <td></td>
                <td id="StudentName" contenteditable></td>
                <td id="Information" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
           </tr>
      ';
 }
 else
 {

   $output .= '
        <tr>
             <td></td>
             <td id="StudentName" contenteditable></td>
             <td id="Information" contenteditable></td>
             <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
             <td><button type="button" name="delete_btn" class="btn btn-xs btn-danger btn_delete">x</button></td>
        </tr>
   ';
 }



 $output .= '</table>
      </div>';
 echo $output;
 ?>
