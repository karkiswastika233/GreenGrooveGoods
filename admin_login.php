<?php
session_start();
include 'config.php'; // Make sure this file contains $conn for DB connection

// If admin is already logged in, redirect to dashboard
if(isset($_SESSION['admin_id'])){
    header('location:admin_page.php');
    exit();
}

$message = [];

if(isset($_POST['submit'])){

    // Sanitize input
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, md5(trim($_POST['password']))); // MD5 hashed

    // Check credentials in DB
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND user_type='admin'";
    $result = mysqli_query($conn, $query) or die('Query failed');

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];

        header('location:admin_page.php');
        exit();
    } else {
        $message[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
// Display error messages
if(!empty($message)){
    foreach($message as $msg){
        echo '<div class="message">'.$msg.'</div>';
    }
}
?>

<section class="form-container">
    <form action="" method="post">
        <h3>Admin Login</h3>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="submit" name="submit" value="Login">
        <p><a href="Forget_password.php">Forgot Password?</a></p>
    </form>
</section>

</body>
</html>
