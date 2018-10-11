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
h4 {
  text-align:center;: left;
  left:0px;
}
a{
  text-decoration: none;
  color:inherit;
}
a:hover{
  text-decoration:underline;
  color: brown;
  left:730px;
  text-align:center;
}
li{
  display: inline-block;
  padding-left: 20px;
}
</style>
</head>


<body>
  <p><h1><center>Welcome To Result Management System</center> </h1></p>
  <br><br>


  <?php

        $sql = "SELECT * FROM   users";
        $records=mysqli_query($conn,$sql);

         $xx=1;?>
        <?php  while($row1 = mysqli_fetch_array($records)):;{?>
               <?php if($_SESSION['login_user'] == $row1['Name']) {?>
                   <?php if($row1['role'] == 'Lecturer') {?>
                      <?php $xx=$xx+1;?>


               <?php break;}}}endwhile;?>
               <?php if($xx != 1){?>
                 <div class="container">
       <ul>

         <div align="right">



         <li ><div class="dropdown">
           <button id="notification" class="btn btn-primary dropdown-toggle"  type="button" data-toggle="dropdown">
         <img src="https://image.flaticon.com/icons/svg/181/181539.svg" width="30" height="30">
             </button>
         <ul id="noti" class="dropdown-menu">  </ul>
         </div>
         </li>



         <li>
 					<a href="Logout.php"><img src="https://image.flaticon.com/icons/svg/56/56805.svg" height="30" width="30"> </a>
 				</li>
           </div>
<br><br><br>
<li>|<a href="GivePermission.php"  href="#" data-toggle="tooltip" >&nbsp Manage Permessions</a></li>
<br><br>

         <li>|<a href ="project managing.php" href="#" > Manage Project Progress</a> </li>
         <li>|<a href="managestudent.php"  href="#" data-toggle="tooltip" > Manage Students Assignments</a></li>

         <br><br>
         <li>|<a href="viewVars.php"   data-toggle="tooltip" > Manage Dictionary</a></li>
        <li>|<a href="UploadFile.php"   data-toggle="tooltip"> Upload File</a></li>
         <li>|<a href ="unioningvariablesstep1.php" data-toggle="tooltip" > Unioning Variables</a> </li>

        <?php } ?>


              </ul>
            </div>
<br><br>
            <?php

                  $sql = "SELECT * FROM   users";
                  $records=mysqli_query($conn,$sql);
             $xy=1;?>
            <?php  while($row1 = mysqli_fetch_array($records)):;{?>
                  <?php if($_SESSION['login_user'] == $row1['Name']) {?>
                      <?php if($row1['role'] == 'Student') {?>
                         <?php $xy=$xy+1;?>


                  <?php break;}}}endwhile;?>
                  <?php if($xy != 1){?>
            <div class="container">

<br>
  <ul>
    <div align="right">



    <li ><div class="dropdown">
      <button id="notification" class="btn btn-primary dropdown-toggle"  type="button" data-toggle="dropdown">
    <img src="https://image.flaticon.com/icons/svg/181/181539.svg" width="30" height="30">
        </button>
    <ul id="noti" class="dropdown-menu">  </ul>
    </div>
    </li>



    <li>
     <a href="Logout.php"><img src="https://image.flaticon.com/icons/svg/56/56805.svg" height="30" width="30"> </a>
   </li>
      </div>

    <h4>Hey and welcome to Result Management System
In this website you can union variables from different researches of Dr. Shiri Lavy.<br>
In order to get access to the data, you first need permission, you can click on <li>|<a  href ="sendingmessage.php" href="#" data-toggle="tooltip" > send message </a> </li> &nbsp to send an automatic message to the website owner.</h4>


   <?php } ?>

         </ul>
       </div>



       <?php

             $sql = "SELECT * FROM   users";
             $records=mysqli_query($conn,$sql);
        $xy=1;?>
       <?php  while($row1 = mysqli_fetch_array($records)):;{?>
             <?php if($_SESSION['login_user'] == $row1['Name']) {?>
                 <?php if($row1['role'] == 'student2') {?>
                    <?php $xy=$xy+1;?>


             <?php break;}}}endwhile;?>
             <?php if($xy != 1){?>
       <div class="container">
         <p><h4><?php echo 'Welcome' . ' ' .$_SESSION['login_user']; ?> <h4></p>
   <br>
   <ul>
     <div align="right">



     <li ><div class="dropdown">
       <button id="notification" class="btn btn-primary dropdown-toggle"  type="button" data-toggle="dropdown">
     <img src="https://image.flaticon.com/icons/svg/181/181539.svg" width="30" height="30">
         </button>
     <ul id="noti" class="dropdown-menu">  </ul>
     </div>
     </li>



     <li>
      <a href="Logout.php"><img src="https://image.flaticon.com/icons/svg/56/56805.svg" height="30" width="30"> </a>
    </li>
       </div>
       </div>
<br><br><br>
     <li>|<a href ="project managing.php" href="#" data-toggle="tooltip">  Manage Project progress</a> </li>
     <li>|<a href="managestudent.php"  href="#" data-toggle="tooltip" > Manage Students Assignments</a></li>
     <li>|<a href="viewVars.php"   data-toggle="tooltip" > Manage Dictionary</a></li>
      <li>|<a href ="unioningvariablesstep1.php" data-toggle="tooltip" > Unioning Variables</a> </li>


   <?php } ?>

    </ul>
   </div>

   <?php

         $sql = "SELECT * FROM   users";
         $records=mysqli_query($conn,$sql);
    $xy=1;?>
   <?php  while($row1 = mysqli_fetch_array($records)):;{?>
         <?php if($_SESSION['login_user'] == $row1['Name']) {?>
             <?php if($row1['role'] == 'student1') {?>
                <?php $xy=$xy+1;?>


         <?php break;}}}endwhile;?>
         <?php if($xy != 1){?>
   <div class="container">
     <p><h4><?php echo 'Welcome' . ' ' .$_SESSION['login_user']; ?> <h4></p>
<br>
<ul>
  <div align="right">



  <li ><div class="dropdown">
    <button id="notification" class="btn btn-primary dropdown-toggle"  type="button" data-toggle="dropdown">
  <img src="https://image.flaticon.com/icons/svg/181/181539.svg" width="30" height="30">
      </button>
  <ul id="noti" class="dropdown-menu">  </ul>
  </div>
  </li>



  <li>
   <a href="Logout.php"><img src="https://image.flaticon.com/icons/svg/56/56805.svg" height="30" width="30"> </a>
  </li>
    </div>
    </div>
<br><br><br>
 <li>|<a href ="unioningvariablesstep1.php" data-toggle="tooltip" > Unioning Variables</a> </li>




<?php } ?>

</ul>
</div>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
  $(document).ready(function(){

   function load_unseen_messages(view = '')
   {
    $.ajax({
     url:"fft.php",
     method:"POST",
     data:{view:view},
     dataType:"json",
     success:function(data)
     {
      $('.dropdown-menu').html(data.messages);
      if(data.unseen_messages > 0)
      {
       $('.count').html(data.unseen_messages);
      }
     }
    });
   }

   load_unseen_messages();

   $(document).on('click', '.dropdown-toggle', function(){
    $('.count').html('');
    load_unseen_messages('yes');
   });

   setInterval(function(){
    load_unseen_messages();;
   }, 5000);

  });
  </script>
</body>
</html>
