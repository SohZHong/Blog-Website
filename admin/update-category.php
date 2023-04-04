<?php
require_once '../includes/config.php';

$name = $_POST["category_name"];

$query1 = "SELECT category_id FROM blog_category WHERE category_name=?";
$searchstmt = $db->prepare($query1);
$searchstmt->bind_param("s", $name);
$searchstmt->execute();
$searchstmt->store_result();
$cat_record = $searchstmt->num_rows;

if (($cat_record == 0 || $_POST['action'] == 'edit') && (!ctype_space($name))){
    if ($_POST['action'] == 'add'){
        $query2= "INSERT INTO blog_category (category_name) VALUES (?)";

        $insertstmt = $db->prepare($query2);
        $insertstmt->bind_param('s', $name);
        
        if ($insertstmt->execute()) {
            echo "<script>alert('Category Added Successfully'); window.location.href='manage-category.php?action=Add+New+Categories';</script>";
        }
        else {
            die('Error: ' . $db->error);
        };
    }elseif ($_POST['action'] == 'edit'){
        
        $id = $_POST['id'];

        $query3="UPDATE blog_category SET category_name=? WHERE category_id= ?;";

        $editstmt = $db->prepare($query3);
        $editstmt->bind_param('ss', $name, $id);

        if ($editstmt->execute()) {
            echo "<script>alert('Category Edited Successfully'); window.location.href='manage-category.php';</script>";
        }
        else {
            die('Error: ' . $db->error);
        };
    }

}else{
    echo "<script>alert('Category already exists! Please try again'); window.history.back();</script>";
};

?>