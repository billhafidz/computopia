<?php
session_start();
include('server/connection.php');

// Get user data from database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: ". mysqli_error($conn));
}

$user_data = mysqli_fetch_assoc($result);

// Set session variables
$admin_name = $_SESSION['admin_name'] ?? $user_data['user_name'];
$user_name = $user_data['user_name'];
$user_email = $user_data['user_email'];
$user_address = $user_data['user_address'];
$user_phone = $user_data['user_phone'];
$user_photo = $user_data['user_photo'];

// Construct URL of user's photo
$photo_url = 'images/' . $user_photo;

// Close database connection
mysqli_close($conn);
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
          <img style="width: 20%; height:20%" src="<?php echo htmlspecialchars($photo_url) ?>">
        </td>
      </tr>
    </table>
  </div>
<a href="adminDashboard.php">
<button type="button" class="btn btn-danger">Kembali</button>
</body>