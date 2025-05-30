<?php // This file adds a business to the database.
session_start(); // Start the session
include 'dbConnect.php';

// Get the business owner, name, category, description, contact info, and location from the form
$business_owner = $_POST["business_owner"] ?? ''; 
$name = $_POST["name"] ?? '';
$category_id = $_POST["category"] ?? '';
$description = $_POST["description"] ?? '';
$contact_info = $_POST["contact_info"] ?? '';
$location = $_POST["location"] ?? '';

// Prepares the statement
$stmt = $conn->prepare("INSERT INTO business (business_owner,category_id, name, description, contact_info, location) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $business_owner, $category_id, $name, $description, $contact_info, $location);

// Executes the statement
if ($stmt->execute()) {
    $_SESSION['success_message'] = "Business '$name' has been successfully added!";
    header("Location: admin_dashboard.php");
    exit;
} else {
    $_SESSION['error_message'] = "Error inserting business: " . $stmt->error;
    header("Location: admin_dashboard.php");
    exit;
}

$stmt->close();
$conn->close();
?>
