<?php
//Import Database Config
require_once '../includes/config.php';
include '../admin/includes/admin-functions.php';

$link = geturl();

if (isset($_GET['destination'])){
    $option = $_GET['destination'];

    switch ($option) {
        case 'home':
            $sort = "post_id";  
            break;
        
        case 'trending':
            $sort = "views"; 
            break;

        case 'recent':
            $sort = "post_created";  
            break;
    }
} else {
    $sort = "post_id";
}

//Get Search Query
if(!empty($_GET['q'])) {

    $search = $_GET['q'];
    $search = $db -> real_escape_string($search); //Remove special characters before entering it into database

    /* Database query to search relevant data */
    $search_query = "SELECT * FROM `blog_category` c INNER JOIN `blog_post` p ON c.category_id = p.category_id INNER JOIN `user` u ON p.user_id = u.user_id WHERE p.`post_status`=1 AND (p.`post_title` LIKE '%".$search."%' OR p.`post_content` LIKE '%".$search."%' OR u.`first_name` LIKE '%".$search."%' OR u.`last_name` LIKE '%".$search."%' OR c.`category_name` LIKE '%".$search."%') ORDER BY p.`$sort` DESC ";

} elseif (!empty($_GET['category'])) {

    $search = $_GET['category'];
    $search = $db -> real_escape_string($search);

    $search_query = "SELECT * FROM `blog_category` c INNER JOIN `blog_post` p ON c.category_id = p.category_id INNER JOIN `user` u ON p.user_id = u.user_id WHERE p.`post_status`=1 AND c.`category_name` = '".$search."' ORDER BY p.`$sort` DESC ";

} else {
    // Default option to display every post
    $search_query = "SELECT * FROM `blog_category` c INNER JOIN `blog_post` p ON c.category_id = p.category_id INNER JOIN `user` u ON p.user_id = u.user_id WHERE p.`post_status`=1 ORDER BY p.`$sort` DESC ";

}

/* Blog Pagination */
$post_per_page = 6;

if (isset($_GET['page'])){
    $page = $_GET['page'];

} else{
    /* Display First Page by Default */
    $page = 1;
};

$offset = ($page - 1) * $post_per_page;
$previous_page = $page - 1;
$next_page = $page + 1;
$adjacents = 2;

$limit="LIMIT " . $offset . ", " . $post_per_page;

/* Get total number of columns in table */
$result = $db->query($search_query);

/* Counting number of rows */
$row_count = $db->affected_rows;

$page_count = ceil($row_count/$post_per_page);

/* After setting page numbers, then limit results per page */
$query = $search_query.$limit;

$stmt = $db->query($query) or die($db->error);
?>

<div class="blog-grid">
    <?php
        if ($row_count > 0){
            //Fetch data based on rows with each row as an element in an array
            while($row = $stmt->fetch_assoc()){

                $qs = 'show-blog.php?post='.$row['post_id'].'';
                $description = trimstr(150, $row["post_content"], $qs);

                echo
                    '<article class="blog-preview">
                        <a class="category" href="blog-home.php?category='.$row["category_name"].'">
                            <i class="fa-solid fa-hashtag"></i>
                            '.$row['category_name'].'
                        </a>
                        <div class="thumbnail-container">
                            <img class="thumbnail" src="uploads/'.$row["post_thumbnail"].'"/>
                        </div>
                        <h2 class="title">
                            <a href="show-blog.php?post='.$row['post_id'].'">
                            '.$row['post_title'].'
                            </a>
                        </h2>
                        <div class="description">
                            <p>'.$description.'</p>
                        </div>
                        <div class="publish-info">
                            <a href="user-home.php?user='.$row["user_id"].'">
                                <i class="fa-solid fa-user"></i><span>'.$row['last_name'].' '.$row['first_name'].'</span>
                            </a>
                            <div>
                                <i class="fa-solid fa-calendar"></i>'.$row['post_created'].'
                            </div>
                        </div>
                    </article>'
            ;};
        } else {
            echo '<div class="error_msg">';
            echo "No Relevant Posts";
            echo '</div>';
        }
    ?>
</div>
<ul class="pagination">

    <?php
    if ($page_count != 1){

        if ($page_count <= 6){
            for ($i = 1; $i <= $page_count; $i++){
                if ($i == $page){
                    echo "<li class='active'><a>$i</a></li>";
                }else{
                    echo "<li><a href='".add_QS($link,'page',$i."'").">$i</a></li>";
                };
            };
        }else{
            if ($page <= 4){
                for ($i = 1; $i <= 5; $i++){
                    if ($i == $page){
                        echo "<li class='active'><a>$i</a></li>";
                    }else{
                        echo "<li><a href='".add_QS($link,'page',$i."'").">$i</a></li>";
                    };
                };
                echo "<li><a>...</a></li>";
            }elseif($page > 4 && $page < ($page_count - 4)) {
                echo "<li><a href= '".add_QS($link,'page', 1)."'>First &rsaquo;&rsaquo;</a></li>";
                echo "<li><a>...</a></li>";
                for ($i = $page - $adjacents; $i <= $page + $adjacents; $i++){
                    if ($i == $page){
                        echo "<li class='active'><a>$i</a></li>";
                    }else{
                        if ($i != 1){
                            echo "<li><a href='".add_QS($link,'page',$i."'").">$i</a></li>";
                        };

                    };
                };
                echo "<li><a>...</a></li>";
            }else{
                echo "<li><a href= '".add_QS($link,'page', 1)."'>First &lsaquo;&lsaquo;</a></li>";
                echo "<li><a>...</a></li>";
                for ($i = $page_count - 6; $i <= $page_count; $i++){
                    if ($i == $page){
                        echo "<li class='active'><a>$i</a></li>";
                    }else{
                        if ($i != 1){
                            echo "<li><a href='".add_QS($link,'page',$i."'").">$i</a></li>";
                        };
                    };
                };
            };
        };
    };
    if($page < $page_count){
        echo "<li><a href= '".add_QS($link,'page', $page_count)."'>Last &rsaquo;&rsaquo;</a></li>";
    };
    ?>

</ul>

