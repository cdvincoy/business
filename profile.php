<?php
include 'dbConnect.php';

$business_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($business_id > 0) {
    $stmt = $conn->prepare("SELECT b.name, b.description, b.contact_info, b.location, c.category_name 
                            FROM business b 
                            JOIN business_category c ON b.category_id = c.category_id 
                            WHERE b.business_id = ?");
    $stmt->bind_param("i", $business_id);
    $stmt->execute();
    $business_result = $stmt->get_result();
    $business = $business_result->fetch_assoc();

    $stmt2 = $conn->prepare("SELECT item_name, description, price 
                             FROM products_and_services 
                             WHERE business_id = ?");
    $stmt2->bind_param("i", $business_id);
    $stmt2->execute();
    $services_result = $stmt2->get_result();
} else {
    die("Invalid business ID.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($business['name']) ?> - Profile</title>
    <link rel="icon" type="image/x-icon" href="ShareBestie_Logo.png">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        .time-bar { background: #f4f4f4; padding: 5px 10px; text-align: center; font-size: 14px; }
        .header { display: flex; justify-content: space-between; align-items: center; background: #333; color: #fff; padding: 10px 20px; }
        .nav-links a { margin: 0 10px; color: #fff; text-decoration: none; }
        .search-bar { padding: 20px; text-align: center; }
        .categories { padding: 20px; }
        .categories ul { list-style-type: none; padding: 0; text-align: center}
        .categories li { margin: 8px 0; background: #f0f0f0; padding: 10px; }
        .footer { background: #333; color: #fff; text-align: center; padding: 10px;width: 100%; bottom: 0; }
        .logo { height: 40px; }
    </style>
</head>
<body>
<div class="container">
    <h1><?= htmlspecialchars($business['name']) ?></h1>
    <div class="info">
        <p>Category: <?= htmlspecialchars($business['category_name']) ?></p>
        <p>Description: <?= nl2br(htmlspecialchars($business['description'])) ?></p>
        <p>Contact Info: <?= htmlspecialchars($business['contact_info']) ?></p>
        <p>Location: <?= htmlspecialchars($business['location']) ?></p>
    </div>

    <?php if ($services_result->num_rows > 0): ?>
    <div class="services">
        <h2>Products & Services</h2>
        <table>
            <tr><th>Item</th><th>Description</th><th>Price</th></tr>
            <?php while ($item = $services_result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($item['item_name']) ?></td>
                    <td><?= htmlspecialchars($item['description']) ?></td>
                    <td>₱<?= number_format($item['price'], 2) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <?php else: ?>
        <p><em>No products or services listed.</em></p>
    <?php endif; ?>
</div>
</body>
</html>
