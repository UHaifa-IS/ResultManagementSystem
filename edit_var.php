
<?php

 include "db.php";
 include "functions.php";

if(isset($_GET['Id'])){

                       $ID = $_GET['Id'];
                        $query = "SELECT * FROM varfile WHERE Id ={$ID}";
                        $result = mysqli_query($connection,$query);
                        confirmQ($result);
                        while($row = mysqli_fetch_assoc($result)){


                            $Name = $row['Name'];

                            $filename=$row['FileName'];
                            $Tags = $row['Tags'];
                            $Abbreviation = $row['Abbreviation'];



update_var($ID);
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  body{
    background-image: url(https://png.pngtree.com/thumb_back/fw800/back_pic/00/10/71/125634e0552ca41.jpg);
    background-size:137%;
  }

  </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

  <br>
<h1 align="center"> Edit Variable </h1>
 <br><br><br>
<div align="center" class="container">


  <form  name="update_var" method="post" action="edit_var.php?Id=<?php echo"$ID";?>" >

            <div class="control-group form-group">
              <div class="controls">
                <label>Name: <?php echo "$Name";?></label>

              </div>
            </div>







               <div class="control-group form-group">
              <div class="controls">
                <label>Tags: </label>
                <input  style="width:170px;" type="text" value="<?php echo "$Tags";?>" class="form-control" name="Tags" >
              </div>
            </div>

    <div class="control-group form-group">
              <div class="controls">
                <label >Synonym: </label>
                <input  style="width:170px;" type="text" value="<?php echo "$Abbreviation";?>"  class="form-control" name="Abbreviation">
              </div>
            </div>


            <button type="submit" class="btn btn-info" name="update_var">Submit</button>



          </form>

          </div>
          <div align="right">
            <form action="viewVars.php"  class="btn btn-secondary">
          <input type="submit" value="Back" class="btn btn-info"/>
        </form>

                                    </div>
</body>
</html>

<?php

}
            }?>
