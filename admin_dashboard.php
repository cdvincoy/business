<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'dbConnect.php'; // Replace with your actual connection file

$sql = "SELECT business_id, category_id, name, description, contact_info, location FROM business";
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

<h2>Add a Business</h2>
<div class="add-business-section">
    <div class="add-form">
        <form method="POST" action="addBusiness.php">
            <table style="width:100%">
                <tr>
                    <td> Business Ownder:</td>
                    <td><input="text" name="business_ownder" required</td>
                </tr>
                <tr>
                    <td class="tlabel">Business Name:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="tlabel">Description:</td>
                    <td><input type="text" name="description"></td>
                </tr>
                <tr>
                    <td class="tlabel">Contact Info:</td>
                    <td><input type="text" name="contact_info"></td>
                </tr>
                <tr>
                    <td class="tlabel">Location:</td>
                    <td><input type="text" name="location"></td>
                </tr>
                <tr>
                    <td class="tlabel">Category:</td>
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
                    <td class="tlabel"></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
    </div>

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
    

<h3>Registered Businesses</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Category ID</th>
        <th>Business Name</th>
        <th>Description</th>
        <th>Contact Info</th>
        <th>Location</th>
        <th>Options</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?> 
            <tr> <!-- add, delete, edit function, if iclick ang edit, show products table para i add delete and edit man, add form para mag add business-->
                <td><?= htmlspecialchars($row["business_id"]) ?></td>
                <td><?= htmlspecialchars($row["category_id"]) ?></td>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><?= htmlspecialchars($row["description"]) ?></td>
                <td><?= htmlspecialchars($row["contact_info"]) ?></td>
                <td><?= htmlspecialchars($row["location"]) ?></td>

                <td align = 'center'> 
                    <form method="POST" action="deleteBusiness.php">
                        <input type='text' style='display:none;' name='business_id' value='<?= $row["business_id"] ?>'>
                        <button type='submit'>Delete</button>
                    </form>
                    <form method="POST" action="editBusiness.php">
                        <input type='text' style='display:none;' name='business_id' value='<?= $row["business_id"] ?>'>
                        <button type='submit'>Edit</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">No businesses found.</td></tr>
    <?php endif; ?>

</table>

</body>
</html>
