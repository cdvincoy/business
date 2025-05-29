<?php
include 'DBConnect.php';

if (isset($_POST["item_id"]) && isset($_POST["business_id"])) {
    $itemID = $_POST["item_id"];
    $businessID = $_POST["business_id"];

    $stmt = $conn->prepare("DELETE FROM products_and_services WHERE item_id = ?");
    $stmt->bind_param("s", $itemID);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    // Use a POST redirect to preserve business_id properly
    echo "<form id='redirectForm' method='POST' action='editBusiness.php'>
            <input type='hidden' name='business_id' value='" . htmlspecialchars($businessID) . "'>
          </form>
          <script>document.getElementById('redirectForm').submit();</script>";
    exit;
} else {
    echo "Invalid request. Missing item ID or business ID.";
}
?>
