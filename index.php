<?php
require_once 'functions.php';
$products = get_all_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Product Management</h1>
    </header>
    <main>
        <a href="add_product.php">Add Product</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" width="100"></td>
                        <td>
                            <a href="edit_product.php?id=<?= $product['id'] ?>">Edit</a> | 
                            <a href="delete_product.php?id=<?= $product['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>© 2023 Product Management. All rights reserved.</p>
    </footer>
</body>
</html>
