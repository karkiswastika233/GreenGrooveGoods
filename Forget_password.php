<?php
session_start();

// Include database connection
include 'config.php'; // your connection file with $conn

if (isset($_POST['reset_request'])) {

    // Sanitize input
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $mobile = mysqli_real_escape_string($conn, trim($_POST['number'] ?? ''));

    // Validate input
    if (empty($email) || empty($mobile)) {
        $_SESSION['reset_error'] = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['reset_error'] = "Please enter a valid email address.";
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ? AND number = ?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $number);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['reset_email'] = $email;
            header("Location: reset_password.php");
            exit();
        } else {
            $_SESSION['reset_error'] = "No user found with this email and mobile number.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">GREEN GROOVE GOODS</a>
    </div>
</nav><br>

<div class="row justify-content-center">
    <div class="col-md-8">
        <center><h3><u>Forgot Password</u></h3></center>
        <?php
        if (isset($_SESSION['reset_error'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['reset_error'] . '</div>';
            unset($_SESSION['reset_error']);
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Enter your Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mobile">Enter your Mobile Number:</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>
            <button type="submit" name="reset_request" class="btn btn-primary">Request Reset</button>
        </form>
    </div>
</div>
</body>
</html>
