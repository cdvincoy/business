<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'dbConnect.php'; // Replace with your actual connection file

$sql = "SELECT business_id, name, description, contact_info, location FROM business";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['admin']; ?>!</h2>
<a href="logout.php">Logout</a>

<h3>Registered Businesses</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Business Name</th>
        <th>Description</th>
        <th>Contact Info</th>
        <th>Location</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["business_id"]) ?></td>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><?= htmlspecialchars($row["description"]) ?></td>
                <td><?= htmlspecialchars($row["contact_info"]) ?></td>
                <td><?= htmlspecialchars($row["location"]) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">No businesses found.</td></tr>
    <?php endif; ?>

</table>

</body>
</html>
