<?php
include('server/connection.php');
session_start();
$query = "SELECT payments.transaction_id, product.product_name, users.user_name, order_items.product_quantity, product.product_price, order_items.order_date
          FROM order_items
          JOIN product ON order_items.product_id = product.product_id
          JOIN users ON order_items.user_id = users.user_id JOIN payments on users.user_id = payments.user_id";
if (!$result = mysqli_query($conn, $query)) {
    echo "Error: " . mysqli_error($conn);
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- my style -->
    <link rel="stylesheet" href="css/admin.css">
</style>
</head>
<body>
    <!-- navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="adminDashboard.php">
                        <span class="icon">
                            <ion-icon name="planet-outline"></ion-icon>
                            <!-- <ion-icon name="logo-electron"></ion-icon>  -->
                            <!-- <ion-icon name="logo-ionitron"></ion-icon> -->
                        </span>
                        <span class="tittle">Computopia</span>
                    </a>
                </li>

                <li>
                    <a href="adminDashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="tittle">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="manageUserAcc.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="tittle">Users</span>
                    </a>
                </li>

                <li>
                    <a href="manageProduct.php">
                        <span class="icon">
                            <ion-icon name="laptop-outline"></ion-icon>
                        </span>
                        <span class="tittle">Products</span>
                    </a>
                </li>

                <li>
                    <a href="adminTransaction.php">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="tittle">Transactions</span>
                    </a>
                </li>

                <li>
                    <a href="rePassword.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="tittle">Re-Password</span>
                    </a>
                </li>

                <li>
                    <a href="adminDashboard.php?logout=1">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="tittle">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here...">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="img/admin/c01.JPG" alt="">
                </div>
            </div>
            
            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1.809</div>
                        <div class="cardName">Costumers</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">100</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">58</div>
                        <div class="cardName">Users</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,423</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                </div>
            </div>

           <!--table--> 
<div class="details">
<div class="recentOrders">
            <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Nama Produk</th>
                    <td>Nama Pembeli</td>
                    <th>Quantity</th>
                    <th>Total Harga</th>
                    <th>Date</th>
                </tr>
            </thead>
<tbody>
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
  <td><?= $row['transaction_id'] ?></td>
  <td><?= $row['product_name'] ?></td>
  <td><?= $row['user_name'] ?></td>
  <td><?= $row['product_quantity'] ?></td>
  <!-- <td><img src="img/products/<?= $row['product_photo'] ?>" alt="" width="50"></td> -->
  <td><?= $row['product_quantity'] * $row['product_price'] ?></td>
  <td><?= $row['order_date'] ?></td>
</tr>
<?php
}
?>
</tbody>
        </table>
    <!-- my js -->
    <script src="js/admin.js"></script>

    <!-- ion icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
