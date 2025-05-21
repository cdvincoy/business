<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "business";


$conn = new mysqli($servername,$username,$password);
$sql = "CREATE DATABASE $dbname";

if($conn->query($sql) === TRUE){
    echo "Database created successfully";
    $conn->close();
    include 'dbTables.php';
    echo "Tables Created";
}
// $conn = new mysqli($servername, $username, $password, $dbname);