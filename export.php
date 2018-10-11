
<?php
 //export.php

 function toNumber($dest)
    {
        if ($dest)
            return ord(strtolower($dest)) - 96;
        else
            return 0;
    }

 if(!empty($_FILES["excel_file"]))
 {
      $connect = mysqli_connect("localhost", "root", "", "resultmanagmentsystem");
      $file_array = explode(".", $_FILES["excel_file"]["name"]);
      $fnm=$_FILES["excel_file"]["name"];
      $dst= "files/".$fnm;

      if($file_array[1] == "xls" || $file_array[1] == "xlsx")
      {

           include("PHPExcel\IOFactory.php");
           require_once 'importClass.php';
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
            // echo "ok";
            // $newImport = new ImportExcel($object);
            // print_r($object);
            // exit;
            $output = '';
          $output .= "
          <label class='text-success'>Data Inserted</label>";
            $out = [];
            $i = 0;
            foreach($object->getWorksheetIterator() as $worksheet){
              $out[$i] = $worksheet->toArray();
              $i++;
            }


            $_data=$out[0][0];
             // print_r($_data);

            for($i=0;$i<sizeof($_data);$i++)
              {
                // $Name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow($row, 1)->getValue());
               // $Type = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                move_uploaded_file($_FILES["excel_file"]["tmp_name"],$dst);

                $query = "
                INSERT INTO varfile
                (Name,  FileName)
                VALUES ('".$_data[$i]."', '".$fnm."')
                ";
               mysqli_query($connect, $query);
              }








 echo $output;
      }
      else
      {
           echo '<label class="text-danger">Invalid File</label>';
      }
 }

 ?>
