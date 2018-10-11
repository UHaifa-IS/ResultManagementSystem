<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "resultmanagmentsystem";

// connect to mysql database


$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$input = filter_input_array(INPUT_POST);

$StudentName = mysqli_real_escape_string($connect, $input['StudentName']);
$Information = mysqli_real_escape_string($connect, $input['Information']);

if($input["action"] === 'edit')
{
 $query = "UPDATE managestudentproject SET StudentName = '".$StudentName."',
 Information = '".$Information."'
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM managestudentproject
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
