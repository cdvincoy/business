<?php
include 'DBConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["business_id"]) && !isset($_POST["submit"])) {
    $businessID = $_POST["business_id"];

    $sql = "SELECT * FROM business WHERE business_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $businessID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $business = $result->fetch_assoc();
    } else {
        echo "Business not found.";
        exit;
    }
    $product_sql = "SELECT * FROM products_and_services WHERE business_id = ?";
    $product_stmt = $conn->prepare($product_sql);
    $product_stmt->bind_param("i", $businessID);
    $product_stmt->execute();
    $products = $product_stmt->get_result();

} elseif (isset($_POST["submit"])) {
    $businessID = $_POST["business_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $contact = $_POST["contact_info"];
    $location = $_POST["location"];
    $category = $_POST["category"];

    $update = $conn->prepare("UPDATE business SET name=?, description=?, contact_info=?, location=?, category_id=? WHERE business_id=?");
    $update->bind_param("sssssi", $name, $description, $contact, $location, $category, $businessID);
    $update->execute();

    header("Location: admin_dashboard.php");
    exit;
}

if (isset($_POST["add_product"])) {
    $item_id = uniqid("item_");
    $item_name = $_POST["item_name"];
    $item_description = $_POST["item_description"];
    $item_price = $_POST["item_price"];
    $businessID = $_POST["business_id"];
    $categoryID = $_POST["category_id"];

    $add_stmt = $conn->prepare("INSERT INTO products_and_services (item_id, business_id, category_id, item_name, description, price) VALUES (?, ?, ?, ?, ?, ?)");
    $add_stmt->bind_param("sisssd", $item_id, $businessID, $categoryID, $item_name, $item_description, $item_price);
    $add_stmt->execute();

    header("Location: editBusiness.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Business</title>
    <style>
        table, td, th {
            border: 1px solid #ccc;
            border-collapse: collapse;
            padding: 8px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Edit Business</h2>
<form method="POST" action="editBusiness.php">
    <input type="hidden" name="business_id" value="<?= $businessID ?>">
    <table>
        <tr><td>Name:</td><td><input type="text" name="name" value="<?= htmlspecialchars($business['name']) ?>"></td></tr>
        <tr><td>Description:</td><td><input type="text" name="description" value="<?= htmlspecialchars($business['description']) ?>"></td></tr>
        <tr><td>Contact Info:</td><td><input type="text" name="contact_info" value="<?= htmlspecialchars($business['contact_info']) ?>"></td></tr>
        <tr><td>Location:</td><td><input type="text" name="location" value="<?= htmlspecialchars($business['location']) ?>"></td></tr>
        <tr>
            <td>Category:</td>
            <td>
                <select name="category">
                    <option value="C01" <?= $business['category_id'] == "C01" ? "selected" : "" ?>>Food & Beverage</option>
                    <option value="C02" <?= $business['category_id'] == "C02" ? "selected" : "" ?>>Tech Services</option>
                    <option value="C03" <?= $business['category_id'] == "C03" ? "selected" : "" ?>>Retail & Fashion</option>
                    <option value="C04" <?= $business['category_id'] == "C04" ? "selected" : "" ?>>Health & Wellness</option>
                    <option value="C05" <?= $business['category_id'] == "C05" ? "selected" : "" ?>>Home Services</option>
                    <option value="C06" <?= $business['category_id'] == "C06" ? "selected" : "" ?>>Education</option>
                    <option value="C07" <?= $business['category_id'] == "C07" ? "selected" : "" ?>>Transportation</option>
                    <option value="C08" <?= $business['category_id'] == "C08" ? "selected" : "" ?>>Arts & Entertainment</option>
                    <option value="C09" <?= $business['category_id'] == "C09" ? "selected" : "" ?>>Finance & Legal</option>
                    <option value="C10" <?= $business['category_id'] == "C10" ? "selected" : "" ?>>Real Estate</option>
                </select>
            </td>
        </tr>
        <tr><td></td><td><input type="submit" name="submit" value="Update Business"></td></tr>
    </table>
</form>

<h3>Products and Services</h3>
<table>
    <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Options</th>
    </tr>
    <?php while ($product = $products->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($product['item_id']) ?></td>
            <td><?= htmlspecialchars($product['item_name']) ?></td>
            <td><?= htmlspecialchars($product['description']) ?></td>
            <td><?= htmlspecialchars($product['price']) ?></td>

            <td align = 'center'> 
                    <form method="POST" action="deleteBusiness.php">
                        <input type='text' style='display:none;' name='business_id' value='<?= $row["business_id"] ?>'>
                        <button type='submit'>Delete</button>
                    </form>
                    <form method="POST" action="editBusiness.php">
                        <input type='text' style='display:none;' name='business_id' value='<?= $row["business_id"] ?>'>
                        <button type='submit'>Edit</button>
                    </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<h3>Add New Product/Service</h3>
<form method="POST" action="addProduct.php">
    <input type="hidden" name="add_product" value="1">
    <input type="hidden" name="business_id" value="<?= $businessID ?>">
    <input type="hidden" name="category_id" value="<?= $business['category_id'] ?>">
    <table>
        <tr><td>Item Name:</td><td><input type="text" name="item_name" required></td></tr>
        <tr><td>Description:</td><td><input type="text" name="item_description"></td></tr>
        <tr><td>Price:</td><td><input type="number" step="0.01" name="item_price"></td></tr>
        <tr><td></td><td><input type="submit" value="Add Product"></td></tr>
    </table>
</form>

</body>
</html>
