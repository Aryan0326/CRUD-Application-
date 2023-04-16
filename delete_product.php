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

// Delete product
if (isset($_POST['submit'])) {
    delete_product($product_id);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Delete Product</h1>
    </header>
    <main>
        <p>Are you sure you want to delete the product "<?= $product['name'] ?>"?</p>
        <form method="POST">
            <button type="submit" name="submit">Yes</button>
            <a href="index.php">No</a>
        </form>
    </main>
</body>
</html>
