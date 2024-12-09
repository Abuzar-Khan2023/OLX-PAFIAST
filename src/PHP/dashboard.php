<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

include 'connection.php';

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Fetch user products
$query = "SELECT * FROM products WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$products = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | OLX PAF-IAST</title>
    <link rel="stylesheet" href="/olx-pafiast/src/CSS/dashboard.css">
</head>
<body>
<header>
    <h1>Welcome, <?php echo $user_name; ?></h1>
    <a href="profile.php" class="profile-link">Profile</a>
    <a href="logout.php" class="logout-link">Logout</a>
</header>

<main>
    <section class="product-upload">
        <h2>Upload Product</h2>
        <form action="upload_product.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <input type="number" name="price" placeholder="Price" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
    </section>

    <section class="product-list">
        <h2>Your Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = $products->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo ucfirst($product['status']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</main>

<script src="/olx-pafiast/src/JavaScript/dashboard.js"></script>
</body>
</html>
