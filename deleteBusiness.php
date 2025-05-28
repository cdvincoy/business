<?php
include 'DBConnect.php';

if (isset($_POST["business_id"])) {
    $businessID = intval($_POST["business_id"]); 
    $conn->query("DELETE FROM products_and_services WHERE business_id = $businessID");
    $stmt = $conn->prepare("DELETE FROM business WHERE business_id = ?");
    $stmt->bind_param("i", $businessID);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: admin_dashboard.php");
exit;
?>
