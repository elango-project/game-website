<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prevent undefined array key errors
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate inputs
    if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        die("Error: All fields are required. <a href='register.html'>Go Back</a>");
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match. <a href='register.html'>Go Back</a>");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: Email already registered. <a href='register.html'>Go Back</a>");
    }
    
    $stmt->close();

    // Insert new user into the correct table
    $stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.html'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
