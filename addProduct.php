<?php
include 'DBConnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_product"])) {
    $businessID = $_POST["business_id"];
    $categoryID = $_POST["category_id"];
    $itemName = $_POST["item_name"];
    $itemDesc = $_POST["item_description"];
    $itemPrice = $_POST["item_price"];

    $result = $conn->query("SELECT MAX(CAST(SUBSTRING(item_id, 2) AS UNSIGNED)) AS max_num FROM products_and_services");
    $row = $result->fetch_assoc();

    $maxNum = isset($row['max_num']) ? (int)$row['max_num'] : 0;  

    $newNum = $maxNum + 1;
    $newItemID = "I" . str_pad($newNum, 3, "0", STR_PAD_LEFT);

    $stmt = $conn->prepare("INSERT INTO products_and_services (item_id, business_id, category_id, item_name, description, price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssd", $newItemID, $businessID, $categoryID, $itemName, $itemDesc, $itemPrice);

    if ($stmt->execute()) {
        header("Location: editBusiness.php?business_id=" . urlencode($businessID));
        exit;
    } else {
        echo "Error inserting product: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
