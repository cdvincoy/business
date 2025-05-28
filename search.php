<?php
include 'dbConnect.php';

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$sql = "SELECT business.business_id, business.name, business_category.category_name FROM business JOIN business_category ON business.category_id = business_category.category_id WHERE business.name LIKE '%$search%' OR business_category.category_name LIKE '%$search%'";
$result = $conn->query($sql);
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

<div class="search-results">
    <h2>Search Results for: "<?= htmlspecialchars($search) ?>"</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Business Name</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <a href="profile.php?id=<?= urlencode($row['business_id']) ?>">
                            <?= htmlspecialchars($row["name"]) ?>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No businesses found matching that name.</p>
    <?php endif; ?>
</div>

</body>
</html>