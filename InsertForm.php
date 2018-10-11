
<?php 

 include "db.php";
 include "functions.php";



?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="container">

  <?php 
create_var();



  ?>
  <form name="insertform" method="post" action="InsertForm.php" >

            <div class="control-group form-group">
              <div class="controls">
                <label>Name: </label>
                <input type="text" class="form-control" name="Name" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="Type">Type: </label>
                <select name="Type" id="">
            <option value="None">Select Option</option>
            <option value="String">String</option>
            <option value="Numeric">Numeric</option>
         </select>
              </div>
            </div>

               <div class="control-group form-group">
              <div class="controls">
                <label>Width: </label>
                <input type="text" class="form-control" name="Width" required>
              </div>
            </div>

             <div class="control-group form-group">
              <div class="controls">
                <label>Decimals: </label>
                <input type="text" class="form-control" name="Decimals" required>
              </div>
            </div>


             <div class="control-group form-group">
              <div class="controls">
                <label for="Label">Label: </label>
                <textarea class="form-control" name="Label" cols="20" rows="5"></textarea>
              </div>
            </div>


             <div class="control-group form-group">
              <div class="controls">
                <label>Values: </label>
                <input type="text" value="None" class="form-control" name="Values" required>
              </div>
            </div>

             <div class="control-group form-group">
              <div class="controls">
                <label>Missing: </label>
                <input type="text" value="None" class="form-control" name="Missing" required>
              </div>
            </div>

               <div class="control-group form-group">
              <div class="controls">
                <label>Columns: </label>
                <input type="text" class="form-control" name="Columns" required>
              </div>
            </div>


               <div class="control-group form-group">
              <div class="controls">
                <label>Align: </label>
                   <select name="Align" id="">
            <option value="None">Select Option</option>
            <option value="Right">Right</option>
            <option value="Left">Left</option>
         </select>
              </div>
            </div>
              <div class="control-group form-group">
              <div class="controls">
                <label>Measure: </label>
                   <select name="Measure" id="">
            <option value="None">Select Option</option>
            <option value="Nominal">Nominal</option>
            <option value="Scale">Scale</option>
         </select>
              </div>
            </div>

   <div class="control-group form-group">
              <div class="controls">
                <label>Role: </label>
                <input type="text" value="Input"  class="form-control" name="Role" required>
              </div>
            </div>

               <div class="control-group form-group">
              <div class="controls">
                <label>Tags: </label>
                <input type="text"  class="form-control" name="Tags" required>
              </div>
            </div>

    <div class="control-group form-group">
              <div class="controls">
                <label>Abbreviation: </label>
                <input type="text"  class="form-control" name="Abbreviation" required>
              </div>
            </div>
           
            <button type="submit" class="btn btn-primary btn-lg" name="create_var">Submit</button>
          </form>

          </div>

</body>
</html>