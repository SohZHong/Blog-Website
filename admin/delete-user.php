<?php
require_once '../includes/config.php';

$id = intval($_GET['id']);
$stmt = "DELETE FROM `user` WHERE `user_id` = $id ";

$db->query($stmt);

echo '<script>window.location.href="manage-user.php"</script>';
?>