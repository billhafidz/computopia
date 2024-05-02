<?php
include('server/connection.php');
session_start();

$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
$user_phone = $_SESSION['user_phone'];
$user_photo = $_SESSION['user_photo'];


if (!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_GET['logout'])) {
  if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['admin_name']);
    header('location: login.php');
    exit;
  }
}
?>

tes
<a href="manageUserAcc.php">Manage User</a>
<a href="adminDashboard.php?logout=1" id="logout-btn">
<button type="button" class="btn btn-danger"> Logout</button>