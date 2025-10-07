<?php
session_start();

// Session timeout (10 minutes)
$timeout = 600;

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// Check session timeout
if(isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > $timeout){
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=1");
    exit();
}

// Update login time
$_SESSION['login_time'] = time();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<p>Your role: <?php echo $_SESSION['role']; ?></p>

<?php if($_SESSION['role'] == 'admin'){ ?>
<p><a href="admin_page.php">Go to Admin Page</a></p>
<?php } ?>

<a href="logout.php">Logout</a>
</body>
</html>
