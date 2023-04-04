<?php
require_once '../includes/config.php';

$id = intval($_POST['id']);
$user = intval($_POST['user']);
$post = intval($_POST['post']);

$stmt = "UPDATE `comment` SET `status` = 0 WHERE `comment_id` = $id ";
$db->query($stmt);

$stmt2 = "UPDATE `user` SET `notification` = `notification` - 1 WHERE `user_id` = $user";
$db->query($stmt2);

echo '<script>window.location.href="../assets/show-blog.php?post='.$post.'"</script>';
?>