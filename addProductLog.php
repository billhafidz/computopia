<?php
include('server/connection.php');

$product_name = $_POST['product_name'];
$product_brand = $_POST['product_brand'];
$product_category = $_POST['product_category'];
$product_desc = $_POST['product_desc'];
$product_criteria = $_POST['product_criteria'];
$product_price = $_POST['product_price'];


$product_photo = $_FILES['product_photo']['name'];
$product_photo_temp = $_FILES['product_photo']['tmp_name'];


move_uploaded_file($product_photo_temp, 'img/products/' . $product_photo);


$query = "INSERT INTO product (product_name, product_brand, product_category, product_desc, product_criteria, product_photo, product_price) VALUES ('$product_name', '$product_brand', '$product_category', '$product_desc', '$product_criteria', '$product_photo', '$product_price')";
$result = mysqli_query($conn, $query);


mysqli_close($conn);


header('Location: manageProduct.php');
exit;

?>
