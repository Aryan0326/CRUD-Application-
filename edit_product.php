<?php
require_once 'functions.php';

// Check if product ID is set
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

// Get product details
$product_id = $_GET['id'];
$product = get_product($product_id);

// Check if product exists
if (!$product) {
    header('Location: index.php');
    exit();
}

// Update product
if (isset($_POST['submit'])) {
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_image = $_POST['image'];

    update_product($product_id, $product_name, $product_description, $product_image);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Product</h1>
    </header>
    <main>
        <form method="POST">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?= $product['name'] ?>" required>

            <label for="description">Product Description:</label>
            <textarea id="description" name="description" required><?= $product['description'] ?></textarea>

            <label for="image">Product Image:</label>
            <input type="text" id="image" name="image" value="<?= $product['image'] ?>" required>

            <button type="submit" name="submit">Update Product</button>
        </form>
    </main>
</body>
</html>
