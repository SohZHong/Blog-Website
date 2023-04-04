<?php
require_once '../includes/config.php';

$id = intval($_GET['id']);
$stmt = "DELETE FROM `blog_post` WHERE `post_id` = $id ";

$db->query($stmt);

echo '<script>window.location.href="index.php"</script>';
?>
