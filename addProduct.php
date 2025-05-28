<?php
include 'dbConnect.php';

$name = $_POST["name"] ?? '';
$category_id = $_POST["category"] ?? '';
$description = $_POST["description"] ?? '';
$contact_info = $_POST["contact_info"] ?? '';
$location = $_POST["location"] ?? '';

$stmt = $conn->prepare("INSERT INTO business (category_id, name, description, contact_info, location) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $category_id, $name, $description, $contact_info, $location);

if ($stmt->execute()) {
    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Error inserting business: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
