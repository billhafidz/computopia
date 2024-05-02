<?php
session_start();
include('server/connection.php');

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_address = $_SESSION['user_address'];
$user_phone = $_SESSION['user_phone'];
$user_photo = $_SESSION['user_photo'];

?>

<body>
  <div>
    <div align = "center">
      <h1>
        Welcome,
        <?php echo $user_name ?>!
      </h1>
    </div>
          <tr>
            <th type="subject">UserId</th>
            <th>:</th>
            <td>
              <?php echo $user_id ?>
            </td>
          </tr>
          <tr>
            <th type="subject">Name</th>
            <th>:</th>
            <td>
              <?php echo $user_name ?>
            </td>
          </tr>
          <tr>
            <th type="subject">Email</th>
            <th>:</th>
            <td>
              <?php echo $user_email ?>
            </td>
          </tr>
          <tr>
            <th type="subject">Address</th>
            <th>:</th>
            <td>
              <?php echo $user_address?>
            </td>
          </tr>
          <tr>
            <th type="subject">Phone</th>
            <th>:</th>
            <td>
              <?php echo $user_phone ?>
            </td>
          </tr>
          <tr>
            <th type="subject">Image</th>
            <th>:</th>
            <td>
              <?php echo $user_photo ?>
            </td>
          </tr>
        </table>
      </div>
    </div>