<?php // This file deletes a business from the database.
include 'DBConnect.php';

// Check if the business_id is set and is an integer 
if (isset($_POST["business_id"])) {
    $businessID = intval($_POST["business_id"]);
    // Delete all products and services associated with the business    
    $conn->query("DELETE FROM products_and_services WHERE business_id = $businessID");
    // Delete the business from the business table
    $stmt = $conn->prepare("DELETE FROM business WHERE business_id = ?");
    $stmt->bind_param("i", $businessID);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: admin_dashboard.php");
exit;
?>
