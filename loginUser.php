<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: userDashboard.php');
  exit;
}

if (isset($_POST['login_btn'])) {
  $login_credential = $_POST['user_email'];
  $password = $_POST['user_password'];

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
      header('location: loginUser.php?error=Akun Tidak DItemukan!');
    }
  } else {
    //Error
    header('location: loginUser.php?error=Something went wrong!');
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
<input class="text-field my-3" name="user_email" type="text" placeholder="Email atau Nomor Telepon" required>

<input class="text-field my-4" name="user_password" type="password" placeholder="Password" required>

<input class="btn btn-light my-4 form-control" type="submit" name="login_btn" value="Login">
</form>