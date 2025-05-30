<?php // This is the search page. 
include 'dbConnect.php';

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// This is the SQL query to search for businesses. 
$sql = "SELECT DISTINCT business.business_id, business.name, business_category.category_name 
        FROM business 
        JOIN business_category ON business.category_id = business_category.category_id 
        LEFT JOIN products_and_services ON business.business_id = products_and_services.business_id 
        WHERE business.name LIKE '%$search%' 
        OR business_category.category_name LIKE '%$search%' 
        OR products_and_services.item_name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!-- This is the HTML code for the search page.  --> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Business Directory</title>
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
        .search-results {
            margin-top: 30px;
        }
        .search-results h2 {
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

<!-- This is the search bar.  --> 
<div class="search-bar">
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search businesses..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>
</div>

<!-- This is the main content of the page.  --> 
<div class="main-content">
    <div class="search-results">
        <h2>Search Results for: "<?= htmlspecialchars($search) ?>"</h2>
        <table class="business-table">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <a href="profile.php?id=<?= urlencode($row['business_id']) ?>">
                                <?= htmlspecialchars($row["name"]) ?>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td>No businesses found matching your search.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>

</body>
</html>
