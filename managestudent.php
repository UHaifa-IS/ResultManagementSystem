<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "resultmanagmentsystem";

// connect to mysql database


$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM manageproject";


$result1 = mysqli_query($connect, $query);

$project = "";

while($row2 = mysqli_fetch_array($result1))
{
    $project = $project."<option>$row2[1]</option>";
}
?>


<html>
      <head>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      </head>
      <body>
   <h1 align="center">Manage Students Assignments</h1>
   <br><br>
           <div class="container">
             <select name="project" id="fetchval" class="form-control action">
             <option value="">Select project</option>
             <?php echo $project; ?>
             </select>
                <br />
                <br />
                <p id="demo"></p>
                <br />
                <div class="table-responsive">

                     <div id="live_data"></div>
                </div>
           </div>
           <div align="right">
             <form action="Main.php"  class="btn btn-secondary">
           <input type="submit" value="Back" class="btn btn-info"/>
       </form>

                                     </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){

$("#fetchval").on('change',function()
               {
  var keyword = $(this).val();
  fetch_data(keyword);

});

          function fetch_data(keyword)
               {
                 var  e = document.getElementById (  "fetchval"  );
                 var  strUser = e.options [e.selectedIndex] .text;

                    $.ajax({
                         url:"ftch2.php",
                         method:"POST",
                         data:'request='+strUser,
                         success:function(data){
                              $('#live_data').html(data);
                         }
                    });
}

// document.write(strUser);
      $(document).on('click', '#btn_add', function(){
        var  e = document.getElementById (  "fetchval"  );
        var  strUser = e.options [e.selectedIndex] .text;

           var StudentName = $('#StudentName').text();
           var Information = $('#Information').text();
           if(StudentName == '')
           {
                alert("Enter StudentName");
                return false;
           }
           if(Information == '')
           {
                alert("Enter Information");
                return false;
           }
           $.ajax({
                url:"insert2.php",
                method:"POST",
                data:{strUser:strUser,StudentName:StudentName, Information:Information},
                dataType:"text",
                success:function(data)
                {
                     alert(data);
                     fetch_data();
                }
           })

      });

      function edit_data(id, text, column_name)
      {
           $.ajax({
                url:"edit2.php",
                method:"POST",
                data:{id:id, text:text, column_name:column_name},
                dataType:"text",
                success:function(data){
                     alert(data);
                }
           });
      }
      $(document).on('blur', '.StudentName', function(){
           var id = $(this).data("id1");
           var StudentName = $(this).text();
           edit_data(id, StudentName, "StudentName");
      });
      $(document).on('blur', '.Information', function(){
           var id = $(this).data("id2");
           var Information = $(this).text();
           edit_data(id,Information, "Information");
      });
      $(document).on('click', '.btn_delete', function(){
           var id=$(this).data("id3");
           if(confirm("Are you sure you want to delete this?"))
           {
                $.ajax({
                     url:"delete2.php",
                     method:"POST",
                     data:{id:id},
                     dataType:"text",
                     success:function(data){
                          alert(data);
                          fetch_data();
                     }
                });
           }
      });
});

 </script>
