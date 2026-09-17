<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_auth");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    // Ensure mobile number starts with +91
    if (!str_starts_with($mobile, "+91")) {
        $mobile = "+91" . $mobile;
    }

    $stmt = $conn->prepare("INSERT INTO users (name, mobile) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $mobile);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location='index.html';</script>";
    } else {
        echo "<script>alert('Error in registration');</script>";
    }
}
?>
