<?php
require_once '../includes/config.php';

$password = $_POST["password"];
$email = $_POST["email"];

//Prevent whitespaces in password
if (!ctype_space($password)){
    $stmt = $db->prepare("UPDATE user SET `user_password` = ? WHERE `user_email` = ?");

    $stmt->bind_param("ss", $password, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Password Changed Successfully'); window.location.href='../assets/login.html';</script>";
    } else {
        echo "Error changing the password: " . $db->error;
    }
} else {
    echo "<script>alert('Password only contains whitespaces! Please try again'); window.history.back();</script>";
}


?>