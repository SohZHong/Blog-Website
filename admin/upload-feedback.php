<?php
include "../includes/config.php";
include "includes/admin-functions.php";

$status = $_POST['status'];
$contact = $_POST['contact'];
$subject = $_POST['subject'];
$desc = $_POST['desc'];

switch ($status) {
    case 'registered':
        include "../includes/session.php";

        $userID = $_SESSION['SessionUserID'];

        $sql = "SELECT first_name, last_name, user_email from user WHERE user_id = $userID";

        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row["last_name"] . " " . $row["first_name"];
                $email = $row["user_email"];
                $stmt = $db->prepare("INSERT INTO support (user_id, name, email, contact_number, subject, description) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $userID, $username, $email, $contact, $subject, $desc);
                if ($stmt->execute()) {
                    echo '<script>alert("Feedback submitted successfully"); window.location.href="../assets/support-user.php"</script>';
                } else {
                    echo "Error: ".$db->error();
                }
            }
        };
        break;
    
    case 'unregistered':
        $username = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $db->prepare("INSERT INTO support (name, email, contact_number, subject, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $contact, $subject, $desc);

        if ($stmt->execute()) {
            echo '<script>alert("Feedback submitted successfully"); window.location.href="../assets/index.php"</script>';
        } else {
            echo "Error: ".$db->error();
        }
        break;
};
