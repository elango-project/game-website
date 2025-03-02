<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $input_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $hashed_password);
        $stmt->fetch();

        if (password_verify($input_password, $hashed_password)) {
            $_SESSION['username'] = $username;
            echo "Login successful! <a href='index.html'>Go to Dashboard</a>";
        } else {
            echo "Invalid password. <a href='login.html'>Try Again</a>";
        }
    } else {
        echo "User not found. <a href='login.html'>Try Again</a>";
    }

    $stmt->close();
    $conn->close();
}
?>
