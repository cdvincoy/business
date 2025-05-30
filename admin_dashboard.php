<?php // This file displays the admin dashboard and allows the admin to add, edit, and delete businesses.
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
// Include the database connection
include 'dbConnect.php';

// Get all businesses from the database
$sql = "SELECT business_id, business_owner, category_id, name, description, contact_info, location FROM business";
$result = $conn->query($sql);

// Define categories
$categoryNames = [
    'C01' => 'Food & Beverage',
    'C02' => 'Tech Services',
    'C03' => 'Retail & Fashion',
    'C04' => 'Health & Wellness',
    'C05' => 'Home Services',
    'C06' => 'Education',
    'C07' => 'Transportation',
    'C08' => 'Arts & Entertainment',
    'C09' => 'Finance & Legal',
    'C10' => 'Real Estate'
];
?>

<!-- HTML code for the admin dashboard -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Miagao Business Directory</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        input[type="text"], select {
            width: 200px;
            padding: 5px;
        }
        .actions form {
            display: inline;
        }
        .add-business-section {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }
        .add-form {
            flex: 1;
        }
        .category-reference {
            width: 300px;
            margin-top: 48px;
        }
        .category-reference caption {
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>

<!-- Welcome message and logout link -->
<h2>Welcome, <?php echo $_SESSION['admin']; ?>! <a href="logout.php" style="float: right; font-size: 16px;">Logout</a></h2>

<?php
// Display success message if set
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
    unset($_SESSION['success_message']); // Clear the message
}

// Display error message if set
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
    unset($_SESSION['error_message']); // Clear the message
}
?>

<!-- Add Business Form -->
<h3>Add a Business</h3>
<div class="add-business-section">
    <div class="add-form">
        <form method="POST" action="addBusiness.php">
            <table>
                <tr>
                    <td>Business Owner:</td>
                    <td><input type="text" name="business_owner" required></td>
                </tr>
                <tr>
                    <td>Business Name:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description"></td>
                </tr>
                <tr>
                    <td>Contact Info:</td>
                    <td><input type="text" name="contact_info"></td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td><input type="text" name="location"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" required>
                            <option value="">Select Category</option>
                            <option value="C01">Food & Beverage</option>
                            <option value="C02">Tech Services</option>
                            <option value="C03">Retail & Fashion</option>
                            <option value="C04">Health & Wellness</option>
                            <option value="C05">Home Services</option>
                            <option value="C06">Education</option>
                            <option value="C07">Transportation</option>
                            <option value="C08">Arts & Entertainment</option>
                            <option value="C09">Finance & Legal</option>
                            <option value="C10">Real Estate</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add Business"></td>
                </tr>
            </table>
        </form>
    </div>
    <!-- Category Reference Table -->
    <table class="category-reference">
        <caption>Category Reference</caption>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
        </tr>
        <?php foreach ($categoryNames as $id => $name): ?>
        <tr>
            <td><?= htmlspecialchars($id) ?></td>
            <td><?= htmlspecialchars($name) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Registered Businesses Table -->
<h3>Registered Businesses</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Business Owner</th>
        <th>Category</th>
        <th>Business Name</th>
        <th>Description</th>
        <th>Contact Info</th>
        <th>Location</th>
        <th>Actions</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?> 
        <!-- Display all businesses in the database -->
        <?php while($row = $result->fetch_assoc()): ?> 
            <tr>
                <td><?= htmlspecialchars($row["business_id"]) ?></td>
                <td><?= htmlspecialchars($row["business_owner"]) ?></td>
                <td><?= htmlspecialchars($row["category_id"]) ?></td>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><?= htmlspecialchars($row["description"]) ?></td>
                <td><?= htmlspecialchars($row["contact_info"]) ?></td>
                <td><?= htmlspecialchars($row["location"]) ?></td>
                <td class="actions">
                    <form method="POST" action="deleteBusiness.php" onsubmit="return confirm('Are you sure you want to delete this business?');">
                        <input type="hidden" name="business_id" value="<?= $row["business_id"] ?>">
                        <input type="submit" value="Delete">
                    </form>
                    <form method="POST" action="editBusiness.php">
                        <input type="hidden" name="business_id" value="<?= $row["business_id"] ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="8">No businesses found.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>
