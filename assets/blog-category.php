<?php
include '../includes/config.php';

$query = "SELECT `category_name` FROM `blog_category` ORDER BY `category_id` DESC";

$result = $db->query($query);

$record = $result->num_rows;
?>
<div class="category-container flex-center">
    <h2>All Categories</h2>
    <div class="category-grid">
    <?php
        if ($record > 0){
            while ($row = $result->fetch_assoc()){

                echo '<div class="category-item">';
                echo '<a href="blog-home.php?category='.$row["category_name"].'">';
                echo $row["category_name"];
                echo '</a>';
                echo '</div>';
            };
        } else {
            echo 'No Categories Available';
        }
    ?>
    </div>
</div>
