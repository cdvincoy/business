<?php
date_default_timezone_set("Asia/Manila"); // Set your preferred timezone
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
        .footer { background: #333; color: #fff; text-align: center; padding: 10px; position: fixed; width: 100%; bottom: 0; }
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

<div class="search-bar">
    <input type="text" placeholder="Search businesses..." style="width: 60%; padding: 10px; font-size: 16px;">
    <button style="padding: 10px; font-size: 16px;">Search</button>
</div>

<div class="categories">
    <h2>Categories</h2>
   <ul>
    <li><a href="category.php?name=Food%20and%20Beverage">Food & Beverage</a></li>
    <li><a href="category.php?name=Tech%20Services">Tech Services</a></li>
    <li><a href="category.php?name=Retail%20and%20Fashion">Retail & Fashion</a></li>
    <li><a href="category.php?name=Health%20and%20Wellness">Health & Wellness</a></li>
    <li><a href="category.php?name=Home%20Services">Home Services</a></li>
    <li><a href="category.php?name=Education">Education</a></li>
    <li><a href="category.php?name=Transportation">Transportation</a></li>
    <li><a href="category.php?name=Arts%20and%20Crafts">Arts & Crafts</a></li>
    <li><a href="category.php?name=Finance%20and%20Legal">Finance & Legal</a></li>
    <li><a href="category.php?name=Real%20Estate">Real Estate</a></li>
</ul>
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html>
