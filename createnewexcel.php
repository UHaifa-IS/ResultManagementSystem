<?php
header_remove();
// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename="Limesurvey_Results.xls"');
// header('Cache-Control: max-age=0');
//mime type
// header('Content-Type: application/vnd.ms-excel');
// //tell browser what's the file name
// header('Content-Disposition: attachment;filename=ahmed.xls');

// header('Cache-Control: max-age=0');
function debug($object){
  echo "<pre>";
  print_r($object);
  echo "</pre>";
 exit;
}
error_reporting(-1);
ini_set('display_errors', 'On');

$for_debug = [];
$data_debug = [];
function toNumber($dest)
   {
       if ($dest)
           return ord(strtolower($dest)) - 96;
       else
           return 0;
   }

  ?>
  <!DOCTYPE html>
   <html>
        <head>
          <style>
          .table {
top: 0;
        display: inline-block;
   filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=3);

   transform: rotate(90deg);

          }
            .table td{

             transform: rotate(270deg);
              height:65px;
          }




          </style>
          <link href="css\bootstrap.min_1.css" rel="stylesheet" type="text/css"/>


        </head>
        <body>
          <div >
            <form action="cencel.php" method="post"   class="btn btn-secondary">

          <input type="submit" name="cencel" id="cencel" value="cencel" class="btn btn-info"/>
      </form>
      <!-- action="http://localhost:8080/Web-finalProject/reset.php" -->
                              <!-- <form action="http://localhost:8080/Web-finalProject/reset.php"  method="post"   class="btn btn-secondary"> -->

                            <input type="button" name="done" id="done" value="done" class="btn btn-info"/>
                        <!-- </form> -->
                        <form action="unioningvariablesstep1.php" method="post"  class="btn btn-secondary">

                      <input type="submit" name="more" id="more" value="AddMore" class="btn btn-info"/>
                  </form>
                        </div>
             <br />


<div class="container"    style="width:10px;">
                  <div   class="table-responsid" >
                       <table    class="table table-bordered table-striped" >
  <?php
include("PHPExcel\IOFactory.php");
$connect = mysqli_connect("localhost", "root", "", "resultmanagmentsystem");
$abb = [];
$flag="false";
$findvarsameab="false";
$e=0;
$q = "SELECT * FROM varfile WHERE hadchosen = 1";
$re = mysqli_query($connect,$q);
while($row3=mysqli_fetch_array($re))
{
  $abb[$e]=$row3["Abbreviation"];
  $e=$e+1;
}

$query = "SELECT * FROM varfile WHERE hadchosen = 1";
$result = mysqli_query($connect,$query);
$query2 = "SELECT * FROM varfile WHERE hadchosen = 1";
$result2 = mysqli_query($connect,$query2);
 ?>

 <?php
 // Instantiate a new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0);
// Initialise the Excel row number
// debug($objPHPExcel);
$rowCount = 1;

//start of printing column names as names of MySQL fields
$column = 'A';

//end of adding column names

//start while loop to get data



// Redirect output to a client’s web browser (Excel5)
/*
each var has checked
*/

 while($row=mysqli_fetch_array($result))

 {

   $for_each_data_array= [];
$n=1;
   $var = $row["Name"];
   $fname = $row["FileName"];
   $upload_file = "./files/" . $fname;
    $file_array = explode(".", $fname);
    $object = PHPExcel_IOFactory::load($upload_file);
?>
<tr>
<?php


    $out = [];
    $i = 0;
    foreach($object->getWorksheetIterator() as $worksheet){
      $out[$i] = $worksheet->toArray();
      $i++;
    }
$_data=$out[0][0];

$data=$out[0];


if($row["Abbreviation"] != null )
        {
          /*
          this while to find the checked variable that have the same abbrivation
          */
           while($row2 = mysqli_fetch_array($result2))
           {

             if($row2["Name"]==$row["Abbreviation"])
             {
                 $var = $row2["Name"];
                 $fname = $row2["FileName"];
                 $upload_file = "./files/" . $fname;
                  $file_array = explode(".", $fname);
                  $object = PHPExcel_IOFactory::load($upload_file);
                  $out = [];
                  $i = 0;
                  foreach($object->getWorksheetIterator() as $worksheet){
                    $out[$i] = $worksheet->toArray();

                    $i++;
                  }

              $_tdata=$out[0][0];

              $tdata=$out[0];

              for($i=0;$i<sizeof($_tdata);$i++)
              {
              if($_tdata[$i]==$row2["Name"])
              {
                 $r=$i;
                 $findvarsameab="true";//we have found another var with the abrivation to var
               }
               }
             }
           }

if($findvarsameab=="true")
{
           for($i=0;$i<sizeof($_data);$i++)
           {
           if($_data[$i]==$row["Name"])
           {
             echo "<td>" .$row["Abbreviation"]."</td>";
               $for_debug [] = $row["Abbreviation"];
             $w=$i;
           }
           }
            for($j=1;$j<sizeof($data);$j++)
            {
                 $_data2=$data[$j];
                   echo "<td>" . $_data2[$w]."</td>";
                    $for_each_data_array []= $_data2[$w];
                   }
           for($j=1;$j<sizeof($tdata);$j++)
           {
            $_tdata2=$tdata[$j];
            $for_each_data_array []= $_tdata2[$r];
              echo "<td>" . $_tdata2[$r]."</td>";
              }
              }
              else {
                for($i=0;$i<sizeof($_data);$i++){
                  if($_data[$i]==$row["Name"]){
                    echo "<td>" .$row["Name"]."</td>";
                      $for_debug [] = $row["Name"];
                    $vv=$i;}}
                    for($j=1;$j<sizeof($data);$j++)
                    {
                     $_data22=$data[$j];
                     $for_each_data_array []=$_data22[$vv];
                       echo "<td>" . $_data22[$vv]."</td>";
                       }
              }
            }

            /*
            there is no abbrivation
            */

              else {
                /*
                to check if one of the checked var is same the abbrivation
                */
                for($k=0;$k<sizeof($abb);$k++)
                {
                  if($abb[$k]==$row["Name"])
                     $flag="true";
                }
             if($flag=="false")
             {
                for($i=0;$i<sizeof($_data);$i++)
                {
                if($_data[$i]==$row["Name"])
                {
                  echo "<td>". $row['Name']  ."</td>";
                  $for_debug [] = $row["Name"];
                  $w=$i;
                }
                }

                     for($j=1;$j<sizeof($data);$j++)
                     {
                      $_data2=$data[$j];
                       // echo "<tr>";
                       $for_each_data_array []=$_data2[$w];
                      //  debug($data);
                      //  $data_debug []= $_data2[$w];
                        echo "<td >" . $_data2[$w]."</td>";

                          // echo "</tr>";
                        }

}

              }
$data_debug [] = $for_each_data_array;
   $findvarsameab="false";
   $flag="false";

?>
</tr>

<?php }
// debug( $for_debug);
// debug($data_debug);
// for ($i = 1; $i < sizeof($for_debug); $i++)
// {
//     $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $for_debug[$i]);
//     $column++;
// }

// $rowCount = 2;
// while($row = mysql_fetch_row($result))
// {
//     $column = 'A';
//     for($j=1; $j<mysql_num_fields($result);$j++)
//     {
//         if(!isset($row[$j]))
//             $value = NULL;
//         elseif ($row[$j] != "")
//             $value = strip_tags($row[$j]);
//         else
//             $value = "";

//         $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
//         $column++;
//     }
//     $rowCount++;
// }
// $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
// Write the Excel file to filename some_excel_file.xlsx in the current directory
// $objWriter->save('some_excel_file.xlsx');

// set active sheet

// read data to active sheet
// $objPHPExcel->getActiveSheet()->fromArray($for_debug);

//save our workbook as this file name
// $filename = 'just_some_random_name.xls';
 //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format

// $objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');

//force user to download the Excel file without writing it to server's HD
// $objWriter->save('php://output');
    // $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    // $writer->save('php://output');
// exit;

// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// $objWriter->save('php://output');



?>


</table>;

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script type="text/javascript" src="js\jquery.table2excel.js"></script>
<script type="text/javascript" src="js\jquery.redirect.js"></script>
<script type="text/javascript">

console.log($('#done'));

// $('#done').click(function(){
//     // $('.table').table2excel({
//     //   name: "My Bio",
//     //   filname:"nw"
//     // });
//     // $.post( "rest.php", function( data ) {
//     //   $( ".result" ).html( data );
//     // });
// });
$(function(){
    $("#done").click(function(){

    var data= {
      "fileds_names":<?php echo json_encode($for_debug) ; ?>,
      "fileds_data": <?php echo json_encode($data_debug) ; ?>,
      "type":"done"
    };
    console.log(data);
    // $.ajax
    // ({
    //     type: "POST",
    //     url: 'reset.php',
    //     dataType: 'json',
    //     data: data,
    //     success: function () {

    //     // alert("Thanks!");
    //     }
    // })


    $.redirect("reset.php", data , "POST", "_blank");

    });
});


</script>
</body>
</html>
