<?php

include 'server/connection.php';

$username = $_POST['user_name'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];

$query = "INSERT INTO users VALUES ('', '$username', '$email', '$password','','','')";

mysqli_query($conn, $query);

echo "<script>alert('Berhasil Register'); window.location.href = 'index.php';</script>";
