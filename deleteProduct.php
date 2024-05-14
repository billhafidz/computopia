<?php
session_start();


if (isset($_GET['id'])) {
    // Get the value of the id variable
    $product_id = $_GET['id'];

    
    include('server/connection.php');

    
    $stmt = $conn->prepare("DELETE FROM product WHERE product_id =?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    
    mysqli_close($conn);


    header('Location: manageProduct.php');
    exit;
}
?>
