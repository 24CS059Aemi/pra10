<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// Check if user is admin
if($_SESSION['role'] != 'admin'){
    echo "Access Denied!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
<h2>Welcome Admin: <?php echo $_SESSION['username']; ?></h2>
<p>This page is only for admin users.</p>
<a href="dashboard.php">Back to Dashboard</a><br>
<a href="logout.php">Logout</a>
</body>
</html>
