<?php
date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Business Directory</title>
    <link rel="icon" type="image/x-icon" href="business_directory.png">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
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
        .about-content { 
            max-width: 800px; 
            margin: 0 auto;
            padding: 20px;
        }
        .about-section {
            background: white;
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .features-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .features-list li {
            margin: 12px 0;
            padding-left: 25px;
            position: relative;
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

<div class="main-content">
    <div class="about-content">
        <div class="about-section">
            <h1>About Business Directory System</h1>
            <p>Welcome to our Miagao Business Directory System, a comprehensive web-based platform designed to connect the local community with businesses in our area. Our mission is to promote local enterprises and make it easier for residents and visitors to discover the services available in our town.</p>
        </div>

        <div class="about-section">
            <h2>Our Purpose</h2>
            <p>The Business Directory System serves as a bridge between local businesses and potential customers. We aim to create a user-friendly platform that helps showcase the diverse range of services and products available in our community.</p>
        </div>

        <div class="about-section">
            <h2>Check out the businesses in Miagao!</h2>
            <p>Our directory includes various business categories such as:</p>
            <ul class="features-list">
                <li>Food & Beverage establishments</li>
                <li>Tech Services</li>
                <li>Retail & Fashion stores</li>
                <li>Health & Wellness services</li>
                <li>Home Services</li>
                <li>Educational institutions</li>
                <li>Transportation services</li>
                <li>Arts & Entertainment</li>
                <li>Financial & Legal services</li>
                <li>Real Estate businesses</li>
            </ul>
        </div>
    </div>
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html> 
