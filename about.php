<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Miagao Business Directory</title>
    <link rel="icon" type="image/x-icon" href="business_directory.png">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; line-height: 1.6; }
        .time-bar { background: #f4f4f4; padding: 5px 10px; text-align: center; font-size: 14px; }
        .header { display: flex; justify-content: space-between; align-items: center; background: #333; color: #fff; padding: 10px 20px; }
        .nav-links a { margin: 0 10px; color: #fff; text-decoration: none; }
        .about-content { 
            max-width: 800px; 
            margin: 40px auto; 
            padding: 0 20px; 
        }
        .about-section {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .footer { 
            background: #333; 
            color: #fff; 
            text-align: center; 
            padding: 10px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
        .logo { height: 40px; }
        .features-list {
            list-style-type: none;
            padding: 0;
        }
        .features-list li {
            margin: 10px 0;
            padding-left: 20px;
            position: relative;
        }
        .features-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #333;
        }
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
        <a href="about.php">About</a>
        <a href="https://www.miagao.gov.ph/news-and-events/">Announcements</a>
        <a href="https://www.google.com/maps/place/Miagao,+Iloilo/data=!4m2!3m1!1s0x33ae5b8a7fae6ec5:0x4a967dd317139cb1?sa=X&ved=1t:242&ictx=111">Map</a>
    </div>
</div>

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
            <li>Arts & Crafts shops</li>
            <li>Financial & Legal services</li>
            <li>Real Estate businesses</li>
        </ul>
    </div>
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html> 
