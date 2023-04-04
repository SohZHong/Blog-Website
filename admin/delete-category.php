<?php
require_once '../includes/config.php';

$id = intval($_GET['id']);
$stmt = "DELETE FROM `blog_category` WHERE `category_id` = $id ";

$db->query($stmt);

echo '<script>window.location.href="manage-category.php"</script>';
?>
