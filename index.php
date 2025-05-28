<?php
date_default_timezone_set("Asia/Manila"); // Set your preferred timezone

include 'dbConnect.php'; // Replace with your actual connection file

$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category){
    $stmt = $conn->prepare("SELECT business_id, name FROM business WHERE category_id = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
}else{
    $sql = "SELECT business_id, name, description, contact_info, location FROM business";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Business Directory</title>
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

<div class="time-bar">
    <?php echo date("l, F j, Y - h:i A"); ?>
</div>

<div class="header">
    <div>
        <img src="logo.png" alt="Business Logo" class="logo">
    </div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Announcements</a>
        <a href="#">Map</a>
    </div>
</div>

<div class="search-bar"> <!-- adds search functionality-->
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search businesses..." style="width: 60%; padding: 10px; font-size: 16px;">
        <button style="padding: 10px; font-size: 16px;">Search</button>
    </form>
</div>

<div class="categories">
    <h2>Categories</h2>
   <ul class="categories-flexbox"> <!-- added filtering-->
    <li><a href="index.php?category=C01">Food & Beverage</a></li>
    <li><a href="index.php?category=C02">Tech Services</a></li>
    <li><a href="index.php?category=C03">Retail & Fashion</a></li>
    <li><a href="index.php?category=C04">Health & Wellness</a></li>
    <li><a href="index.php?category=C05">Home Services</a></li>
    <li><a href="index.php?category=C06">Education</a></li>
    <li><a href="index.php?category=C07">Transportation</a></li>
    <li><a href="index.php?category=C08">Arts & Crafts</a></li>
    <li><a href="index.php?category=C09">Finance & Legal</a></li>
    <li><a href="index.php?category=C10">Real Estate</a></li>
    <li><a href="index.php">Show All</a></li>
</ul>
</div>

<div class="business"> <!--makes businesses appear in index--> 
    <h2>Registered Businesses</h2>
    <table class="table-flexbox">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <a href="profile.php?id=<?= $row['business_id'] ?>">
                        <?= htmlspecialchars($row["name"]) ?>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">No businesses found.</td></tr>
    <?php endif; ?>
</table>
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html>
