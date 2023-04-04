<?php
require_once '../includes/config.php';

$id = intval($_GET['id']);
$stmt = "DELETE FROM `support` WHERE `sup_id` = $id ";

$db->query($stmt);

echo '<script>window.location.href="manage-feedback.php"</script>';
?>