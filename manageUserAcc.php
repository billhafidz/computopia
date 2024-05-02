<?php
session_start();
include('server/connection.php');

// Get user data
$admin_name = $_SESSION['admin_name'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'N/A';
$user_address = isset($_SESSION['user_address']) ? $_SESSION['user_address'] : 'N/A';
$user_phone = isset($_SESSION['user_phone']) ? $_SESSION['user_phone'] : 'N/A';
$user_photo = isset($_SESSION['user_photo']) ? $_SESSION['user_photo'] : 'N/A';
?>

<body>
  <div>
      <h1>
        Welcome,
        <?php echo htmlspecialchars($admin_name) ?>!
      </h1>
    </div>
    <table>
      <tr>
        <th type="subject">UserId</th>
        <th>:</th>
        <td>
          <?php echo htmlspecialchars($user_id) ?>
        </td>
      </tr>
      <tr>
        <th type="subject">Name</th>
        <th>:</th>
        <td>
          <?php echo htmlspecialchars($user_name) ?>
        </td>
      </tr>
      <tr>
        <th type="subject">Email</th>
        <th>:</th>
        <td>
          <?php echo htmlspecialchars($user_email) ?>
        </td>
      </tr>
      <tr>
        <th type="subject">Address</th>
        <th>:</th>
        <td>
          <?php echo htmlspecialchars($user_address) ?>
        </td>
      </tr>
      <tr>
        <th type="subject">Phone</th>
        <th>:</th>
        <td>
          <?php echo htmlspecialchars($user_phone) ?>
        </td>
      </tr>
      <tr>
        <th type="subject">Image</th>
        <th>:</th>
        <td>
          <?php echo htmlspecialchars($user_photo) ?>
        </td>
      </tr>
    </table>
  </div>
</body>