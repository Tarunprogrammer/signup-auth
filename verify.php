<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['otp'] == $_SESSION['otp']) {
        $conn = new mysqli("localhost", "root", "", "user_auth");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $mobile = $_SESSION['mobile'];
        $password = $_SESSION['password'];

        $stmt = $conn->prepare("INSERT INTO users (name, email, mobile, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $mobile, $password);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location='index.html';</script>";
            session_destroy();
        } else {
            echo "<script>alert('Error in registration'); window.location='index.html';</script>";
        }
    } else {
        echo "<script>alert('Incorrect OTP'); window.location='verify.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Enter OTP</h2>
        <form action="verify.php" method="POST">
            <input type="text" name="otp" placeholder="Enter OTP" required>
            <button type="submit">Verify OTP</button>
        </form>
    </div>
</body>
</html>
