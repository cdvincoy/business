<?php // This file deletes a product or service from the database.
include 'DBConnect.php';

// Check if the form has been submitted
if (isset($_POST["item_id"]) && isset($_POST["business_id"])) {
    // Get the item_id and business_id from the form
    $itemID = $_POST["item_id"];
    $businessID = $_POST["business_id"];

    // Prepare the statement to delete the product from the database
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
