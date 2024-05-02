<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: adminDashboard.php');
  exit;
}

if (isset($_POST['login_btn'])) {
  $admin_name = $_POST['admin_name'];
  $admin_password = $_POST['admin_password'];

  $query = "SELECT * FROM admins WHERE admin_name = ? AND admin_password = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('ss', $admin_name, $admin_password);

  if ($stmt_login->execute()) {
    $stmt_login->bind_result($admin_id, $admin_name, $admin_password, $admin_phone,$admin_photo);
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->fetch();
      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_phone'] = $admin_phone;
      $_SESSION['admin_photo'] = $admin_photo;
      $_SESSION['logged_in'] = true;

      header('location: adminDashboard.php?message=Berhasil Login');
    } else {
      header('location: loginAdmin.php?error=Akun Tidak DItemukan!');
    }
  } else {
    //Error
    header('location: loginAdmin.php?error=Something went wrong!');
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" href="images/samples/nn.jpg" />
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/61f8d3e11d.js" crossorigin="anonymous"></script>
  <title>Login Admin</title>
</head>
<form method="post">
<input class="text-field my-3" name="admin_name" type="text" placeholder="Username" required>

<input class="text-field my-4" name="admin_password" type="password" placeholder="Password" required>

<input class="btn btn-light my-4 form-control" type="submit" name="login_btn" value="Login">
</form>