<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $upload_dir = 'uploads/';

    if ($error !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $error);
    }

    move_uploaded_file($tmp_name, $upload_dir . $image);

    if (add_product($name, $description, $upload_dir . $image)) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Error adding product';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add Product</h1>
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required><br>

            <button type="submit">Add Product</button>
        </form>
    </
