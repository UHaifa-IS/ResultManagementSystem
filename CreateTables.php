<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ResultManagmentSystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

////sql to create table
$sql = "CREATE TABLE Users (
Name VARCHAR(30) NOT NULL,
Gmail VARCHAR(100)  PRIMARY KEY,
phoneNumber VARCHAR(100) NOT NULL,
Password VARCHAR(30) NOT NULL,
role VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table  created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sql = "INSERT INTO Users (Name, Gmail,phoneNumber,Password,role)
VALUES ('shiri', 'shirilavi@gmail.com','0528814582','1q2w3e4r!','Lecturer')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE ManageProject (
id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
ProjectName VARCHAR(10000) NOT NULL,
Information VARCHAR(10000) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table  created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE ManagestudentProject (
id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
ProjectName VARCHAR(10000) NOT NULL,
idofpro INT(10) NOT NULL,
StudentName VARCHAR(10000),
Information VARCHAR(10000) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table  created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE noti (
id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL ,
notification VARCHAR(1000) NOT NULL,
message VARCHAR(1000) NOT NULL,
status int(10) NOT NULL,
sender VARCHAR(1000) NOT NULL
)ENGINE=MyISAM ";
if (mysqli_query($conn, $sql)) {
    echo "Table  created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


$sql = "CREATE TABLE VarFile (
Id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(30) NOT NULL ,
FileName VARCHAR(100) NOT NULL,
Tags VARCHAR(100) NOT NULL,
Abbreviation VARCHAR(100) NOT NULL,
hadchosen INT(10) NOT NULL
)ENGINE=MyISAM ";
if (mysqli_query($conn, $sql)) {
    echo "Table  created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}




mysqli_close($conn);
?>
