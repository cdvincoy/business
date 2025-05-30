<?php
date_default_timezone_set("Asia/Manila"); // Set timezone to Philippines

include 'dbConnect.php'; 

$category = isset($_GET['category']) ? $_GET['category'] : null;

// Get all businesses with their category names
if($category) {
    $stmt = $conn->prepare("SELECT b.*, bc.category_name 
                           FROM business b 
                           JOIN business_category bc ON b.category_id = bc.category_id 
                           WHERE b.category_id = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT b.*, bc.category_name 
            FROM business b 
            JOIN business_category bc ON b.category_id = bc.category_id";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Business Directory</title>
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
        .categories { 
            margin-bottom: 30px;
        }
        .categories h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .categories ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        .categories li {
            display: inline;
            margin: 0 10px;
        }
        .categories a {
            color: #333;
            text-decoration: none;
        }
        .categories a:hover {
            text-decoration: underline;
        }
        .categories a.active {
            font-weight: bold;
            text-decoration: underline;
        }
        .business-list {
            margin-top: 30px;
        }
        .business-list h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .business-table {
            width: 100%;
            border-collapse: collapse;
        }
        .business-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .business-table a {
            color: #333;
            text-decoration: none;
        }
        .business-table a:hover {
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

<!-- Search Bar --> 
<div class="search-bar">
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search businesses...">
        <button type="submit">Search</button>
    </form>
</div>

<!-- Categories --> 
<div class="main-content">
    <div class="categories">
        <h2>Business Categories</h2>
        <ul>
            <!-- This is the list of categories.  --> 
            <li><a href="index.php?category=C01" class="<?= $category === 'C01' ? 'active' : '' ?>">Food & Beverage</a></li>
            <li><a href="index.php?category=C02" class="<?= $category === 'C02' ? 'active' : '' ?>">Tech Services</a></li>
            <li><a href="index.php?category=C03" class="<?= $category === 'C03' ? 'active' : '' ?>">Retail & Fashion</a></li>
            <li><a href="index.php?category=C04" class="<?= $category === 'C04' ? 'active' : '' ?>">Health & Wellness</a></li>
            <li><a href="index.php?category=C05" class="<?= $category === 'C05' ? 'active' : '' ?>">Home Services</a></li>
            <li><a href="index.php?category=C06" class="<?= $category === 'C06' ? 'active' : '' ?>">Education</a></li>
            <li><a href="index.php?category=C07" class="<?= $category === 'C07' ? 'active' : '' ?>">Transportation</a></li>
            <li><a href="index.php?category=C08" class="<?= $category === 'C08' ? 'active' : '' ?>">Arts & Entertainment</a></li>
            <li><a href="index.php?category=C09" class="<?= $category === 'C09' ? 'active' : '' ?>">Finance & Legal</a></li>
            <li><a href="index.php?category=C10" class="<?= $category === 'C10' ? 'active' : '' ?>">Real Estate</a></li>
        </ul>
    </div>

    <!-- This is the list of businesses.  --> 
    <div class="business-list">
        <h2>Registered Businesses</h2>
        <table class="business-table">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <!-- This is the link to the business profile.  --> 
                        <a href="profile.php?id=<?= $row['business_id'] ?>">
                            <?= htmlspecialchars($row["name"]) ?>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td>No businesses found.</td></tr>
        <?php endif; ?>
        </table>
    </div>
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html>
