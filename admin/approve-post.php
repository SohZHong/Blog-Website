<?php
require_once ('../includes/config.php');

$id = intval($_GET['id']);

$query = "UPDATE `blog_post` SET `post_status`=1 WHERE `post_id`='$id';";
    
if ($db->query($query)){
    echo '<script>window.location.href="index.php"</script>';
}else{
    echo '<script>alert("Approval Failed")</script>';
}
?>