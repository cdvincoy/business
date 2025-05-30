<?php   // This is the profile page. 
include 'dbConnect.php';

$business_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($business_id > 0) {
    // This is the SQL query to get the business information. 
    $stmt = $conn->prepare("SELECT b.name, b.description, b.contact_info, b.location, c.category_name 
                            FROM business b 
                            JOIN business_category c ON b.category_id = c.category_id 
                            WHERE b.business_id = ?");
    $stmt->bind_param("i", $business_id);
    $stmt->execute();
    $business_result = $stmt->get_result();
    $business = $business_result->fetch_assoc();

    // This is the SQL query to get the products and services information. 
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
    <title><?= htmlspecialchars($business['name']) ?> - Business Directory</title>
    <link rel="icon" type="image/x-icon" href="business_directory.png">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .time-bar { 
            background: #f4f4f4; 
            padding: 5px 10px; 
            text-align: center; 
            font-size: 14px; 
        }
        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            background: #333; 
            color: #fff; 
            padding: 10px 20px; 
        }
        .nav-links a { 
            margin: 0 10px; 
            color: #fff; 
            text-decoration: none; 
        }
        .nav-links a:hover {
            color: #ddd;
        }
        .search-bar { 
            padding: 20px; 
            text-align: center;
            background: #f9f9f9;
        }
        .search-bar input[type="text"] {
            width: 60%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            background: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-bar button:hover {
            background: #444;
        }
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
        }
        .business-profile {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .business-profile h1 {
            color: #333;
            margin: 0 0 20px 0;
            text-align: center;
        }
       
        .business-profile .info strong {
            color: #555;
            width: 120px;
            display: inline-block;
        }
        .services {
            margin-top: 30px;
        }
        .services h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .services table {
            width: 100%;
            margin-top: 10px;
        }
        .services th, .services td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .services th {
            background: #f5f5f5;
            color: #333;
            font-weight: bold;
        }
       
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #333;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .footer { 
            background: #333; 
            color: #fff; 
            text-align: center; 
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-top: auto;
        }
        .logo { 
            height: 40px; 
        }
    </style>
</head>
<body>

<div class="time-bar">
    <?php echo date("l, F j, Y - h:i A"); ?>
</div>

<div class="header">
    <div>
        <img src="business_directory.png" alt="Business Logo" class="logo">
    </div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="https://www.miagao.gov.ph/news-and-events/">Announcements</a>
        <a href="https://www.google.com/maps/place/Miagao,+Iloilo/">Map</a>
    </div>
</div>

<div class="search-bar">
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search businesses...">
        <button type="submit">Search</button>
    </form>
</div>

<!-- This is the main content of the page.  --> 
<div class="main-content">
    <a href="index.php" class="back-link">Back to Business List</a>
    
    <div class="business-profile">
        <!-- This is the business name.  --> 
        <h1><?= htmlspecialchars($business['name']) ?></h1>
        <div class="info">
            <p><strong>Category:</strong> <?= htmlspecialchars($business['category_name']) ?></p>
            <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($business['description'])) ?></p>
            <p><strong>Contact Info:</strong> <?= htmlspecialchars($business['contact_info']) ?></p>
            <p><strong>Location:</strong> <?= htmlspecialchars($business['location']) ?></p>
        </div>

        <!-- This is the products and services section.  --> 
        <?php if ($services_result->num_rows > 0): ?>
        <div class="services">
            <h2>Products & Services</h2>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
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
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html>
