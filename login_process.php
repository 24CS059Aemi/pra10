<?php
session_start();

// Dummy users array
$users = [
    "admin" => ["password" => "admin123", "role" => "admin"],
    "user" => ["password" => "user123", "role" => "user"]
];

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Validate user
if(isset($users[$username]) && $users[$username]['password'] === $password){
    // Set session variables
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $users[$username]['role'];
    $_SESSION['login_time'] = time(); // for session timeout

    // Redirect to dashboard
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid username or password. <a href='login.php'>Try again</a>";
}
?>
