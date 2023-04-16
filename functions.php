<?php

require_once 'db_connect.php';

// get all products
function get_all_products() {
  global $conn;
  
  $sql = "SELECT * FROM products";
  $result = mysqli_query($conn, $sql);
  
  $products = array();
  
  while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
  }
  
  return $products;
}

// get a single product by id
function get_product($id) {
  global $conn;
  
  $sql = "SELECT * FROM products WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  
  $product = mysqli_fetch_assoc($result);
  
  return $product;
}

// add a new product
function add_product($name, $description, $image) {
  global $conn;
  
  // escape input data to prevent SQL injection attacks
  $name = mysqli_real_escape_string($conn, $name);
  $description = mysqli_real_escape_string($conn, $description);
  $image = mysqli_real_escape_string($conn, $image);
  
  $sql = "INSERT INTO products (name, description, image) VALUES ('$name', '$description', '$image')";
  
  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    return false;
  }
}

// update a product
function update_product($id, $name, $description, $image) {
  global $conn;
  
  // escape input data to prevent SQL injection attacks
  $id = mysqli_real_escape_string($conn, $id);
  $name = mysqli_real_escape_string($conn, $name);
  $description = mysqli_real_escape_string($conn, $description);
  $image = mysqli_real_escape_string($conn, $image);
  
  $sql = "UPDATE products SET name = '$name', description = '$description', image = '$image' WHERE id = '$id'";
  
  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    return false;
  }
}

// delete a product
function delete_product($id) {
  global $conn;
  
  $sql = "DELETE FROM products WHERE id = '$id'";
  
  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    return false;
  }
}

?>
