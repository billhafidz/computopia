<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: userDashboard.php');
  exit;
}
if (isset($_SESSION['logged_in'])) {
  header('location: adminDashboard.php');
  exit;
}
if (isset($_POST['login_btn'])) {
  $login_credential = $_POST['login_credential'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE (user_email = ? OR user_phone = ?) AND user_password = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('sss', $login_credential, $login_credential, $password);

  if ($stmt_login->execute()) {
    $stmt_login->bind_result($user_id, $user_name, $user_email, $user_password, $user_address, $user_phone,$user_photo);
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->fetch();
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['user_address'] = $user_address;
      $_SESSION['user_phone'] = $user_phone;
      $_SESSION['user_photo'] = $user_photo;
      $_SESSION['logged_in'] = true;

      header('location: userDashboard.php?message=Berhasil Login');
    } else {
      header('location: login.php?error=Akun Tidak DItemukan!');
    }
  } else {
    //Error
    header('location: login.php?error=Something went wrong!');
  }
}

if (isset($_POST['login_btn_adm'])) {
  $login_credential = $_POST['login_credential'];
  $password = $_POST['password'];

  $query = "SELECT * FROM admins WHERE admin_name = ? AND admin_password = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('ss', $login_credential, $password);

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
      header('location: login.php?error=Akun Tidak DItemukan!');
    }
  } else {
    //Error
    header('location: login.php?error=Something went wrong!');
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
  <title>Login Test</title>
</head>
<form method="post">
  <input class="text-field my-3" name="login_credential" type="text" placeholder="Username/Email/Phone" required>
  <input class="text-field my-4" name="password" type="password" placeholder="Password" required>
  <input class="btn btn-light my-4 form-control" type="submit" name="login_btn" value="Login User">
  <input class="btn btn-light my-4 form-control" type="submit" name="login_btn_adm" value="Login Admin">
</form>
