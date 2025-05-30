<?php // This file contains the connection to the database.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "business";

// Create database
// $conn = new mysqli($servername,$username,$password);
// $sql = "CREATE DATABASE $dbname";

// if($conn->query($sql) === TRUE){
//     echo "Database created successfully";
//     $conn->close();
//     include 'tables.php';
//     echo "Tables Created";
// } else{

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
