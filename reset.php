<?php
ob_start();
header_remove();
ob_end_clean();
// ob_start();
error_reporting(-1);
ini_set('display_errors', 'On');
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename=filename.xls");



function debug($object){
  echo "<pre>";
  print_r($object);
  echo "</pre>";
 exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultManagmentSystem";
include("PHPExcel\IOFactory.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php
// debug($_POST);

if(isset($_POST["type"])&&$_POST["type"] == "done")
{

$filed_names = $_POST['fileds_names'];
$filed_data = $_POST['fileds_data'];
// debug($filed_data);
$objPHPExcel = new PHPExcel();
// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0);

$rowCount = 1;

$column = 'A';
$i=0;
$array = ['a','b'];
foreach ($filed_names as $key) {
    # code...
    // debug($key);
    $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $key);
    $column++;
    $i++;
}
// debug($objPHPExcel);

$rowCount = 2;
$column = 'A';
foreach ($filed_data as $key )
{

    for($j=0; $j<sizeof($key);$j++)
    {

        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $key[$j]);
        $rowCount++;
    }
    $rowCount = 2;
    $column++;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
debug($objWriter->save('php://output'));

$update_query = "UPDATE varfile SET 	hadchosen = 0 WHERE hadchosen=1";
 if(mysqli_query($conn, $update_query))
    	header("Location:http://localhost:8080/Web-finalProject/Main.php");


}
?>
