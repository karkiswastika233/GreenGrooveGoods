<?php
session_start();
@include 'config.php'; // Make sure $conn is defined here

// Session check
if(!isset($_SESSION['admin_id'])){
    header('location:admin_login.php');
    exit();
}

$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];

// Helper function to get counts or sums
function getTotal($conn, $table, $column = null, $condition = null) {
    $query = "SELECT ";
    if($column === 'sum') {
        $query .= "SUM(total_price) AS total FROM $table";
    } else {
        $query .= "COUNT(*) AS total FROM $table";
    }
    if($condition) {
        $query .= " WHERE $condition";
    }
    $result = mysqli_query($conn, $query) or die('Query failed');
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

// Totals
$total_pendings   = getTotal($conn, 'orders', 'sum', "payment_status='pending'");
$total_completed  = getTotal($conn, 'orders', 'sum', "payment_status='completed'");
$total_orders     = getTotal($conn, 'orders');
$total_products   = getTotal($conn, 'products');
$total_users      = getTotal($conn, 'users', null, "user_type='user'");
$total_admins     = getTotal($conn, 'users', null, "user_type='admin'");
$total_accounts   = getTotal($conn, 'users');
$total_messages   = getTotal($conn, 'message');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php @include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="title">Dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>Rs.<?php echo $total_pendings; ?></h3>
         <p>Total Pendings</p>
      </div>

      <div class="box">
         <h3>Rs.<?php echo $total_completed; ?></h3>
         <p>Completed Payments</p>
      </div>

      <div class="box">
         <h3><?php echo $total_orders; ?></h3>
         <p>Orders Placed</p>
      </div>

      <div class="box">
         <h3><?php echo $total_products; ?></h3>
         <p>Products Added</p>
      </div>

      <div class="box">
         <h3><?php echo $total_users; ?></h3>
         <p>Normal Users</p>
      </div>

      <div class="box">
         <h3><?php echo $total_admins; ?></h3>
         <p>Admin Users</p>
      </div>

      <div class="box">
         <h3><?php echo $total_accounts; ?></h3>
         <p>Total Accounts</p>
      </div>

      <div class="box">
         <h3><?php echo $total_messages; ?></h3>
         <p>New Messages</p>
      </div>

   </div>

</section>

<script src="js/admin_script.js"></script>

</body>
</html>
