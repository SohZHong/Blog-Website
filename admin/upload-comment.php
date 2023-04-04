<?php
include("../includes/config.php");
include("../includes/session.php");

$userID = $_POST['userID'];
$postid = $_POST['postID'];
$comment = $_POST['comment'];

$stmt = $db->prepare("INSERT INTO comment (post_id, user_id, comment) VALUES (?,?,?)");

$stmt->bind_param("sss", $postid, $_SESSION['SessionUserID'], $comment);

if ($stmt->execute()) {
    
    $query = $db->prepare("UPDATE `user` SET `notification` = `notification` + 1 WHERE `user_id`=? ");

    $query->bind_param("i", $userID);

    $query->execute();

    echo '<script>alert("Comment Added Succcessfully!"); window.history.back(); </script>';

} else {
    echo "Error".$db->error;
};
?>
