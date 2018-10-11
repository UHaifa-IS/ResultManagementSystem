<?php

$connect = mysqli_connect("localhost", "root", "", "resultmanagmentsystem");
$columns = array('ProjectName', 'StudentName' ,'Information');

$query = "SELECT * FROM managestudentproject ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE ProjectName LIKE "%'.$_POST["search"]["value"].'%"
 OR Information LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}



$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query );

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="ProjectName">' . $row["ProjectName"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Information">' . $row["Information"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete Project</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM manageproject";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(

 "data"    => $data
);

echo json_encode($output);

?>
