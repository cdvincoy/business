<?php
// Example categories - you can later fetch these from a database
$categories = ["Restaurants", "Health & Wellness", "Retail", "Education", "Automotive", "Technology", "Finance"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BizFinder - Your Local Business Directory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        header {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }
        .about {
            margin-bottom: 30px;
            background: white;
            padding: 15px;
            border-radius: 8px;
        }
        .search-bar {
            margin-bottom: 30px;
        }
        .search-bar input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
        }
        .search-bar input[type="submit"] {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .categories {
            background: white;
            padding: 15px;
            border-radius: 8px;
        }
        .categories ul {
            list-style-type: none;
            padding: 0;
        }
        .categories li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<header>
    <h1>BizFinder</h1>
    <p>Miagao Business Directory</p>
</header>

<div class="container">
    <section class="about">
        <h2>About BizFinder</h2>
        <p>BizFinder helps you discover businesses near you. Whether you're looking for a restaurant, a car repair shop, or a tech service provider, we’ve got you covered.</p>
    </section>

    <section class="search-bar">
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="Search for businesses, services..." required>
            <input type="submit" value="Search">
        </form>
    </section>

    <section class="categories">
        <h2>Browse Categories</h2>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><?php echo htmlspecialchars($category); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>

</body>
</html>

