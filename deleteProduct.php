<?php
include 'DBConnect.php';

if (isset($_POST["item_id"])) {
    $itemID = $_POST["item_id"];

    $stmt = $conn->prepare("DELETE FROM products_and_services WHERE item_id = ?");
    $stmt->bind_param("s", $itemID);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: editBusiness.php");
exit;
?>
