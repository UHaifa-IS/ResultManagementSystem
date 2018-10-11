<html>
      <head>
           <title></title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <style>
           body{
             background-image: url(https://png.pngtree.com/thumb_back/fw800/back_pic/00/10/71/125634e0552ca41.jpg);
             background-size:400%;
           }
                body
                {
                     margin:0;
                     padding:0;
                     background-color:#f1f1f1;
                }
                .box
                {
                     width:900px;
                     padding:20px;
                     background-color:#fff;
                     border:1px solid #ccc;
                     border-radius:5px;
                     margin-top:100px;
                }
           </style>
      </head>
      <body>
         <div class="container box">
          <p><h1><center>Upload File</center> </h1></p>


                <br /><br />
                <br /><br />
                <form mehtod="post" id="export_excel">
                     <label>Choose File</label>
                     <input type="file" name="excel_file" id="excel_file" />

                </form>
                <br />
                <br />
  <div id="result">
           </div>
           <div align="right">
                               <form action="Main.php"  class="btn btn-secondary">

                             <input type="submit" value="Back" class="btn btn-info"/>
                         </form>
                         </div>
           </div>

      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#excel_file').change(function(){
           $('#export_excel').submit();
      });
      $('#export_excel').on('submit', function(event){
           event.preventDefault();
           $.ajax({
                url:"export.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                     $('#result').html(data);
                     $('#excel_file').val('');
                }
           });
      });
 });
 </script>
