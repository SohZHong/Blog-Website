<?php
include '../admin/includes/admin-functions.php';

$link = geturl();

$id = $_GET['post'];

/* Limit comments per page */
$comment_per_page = 6;

if (isset($_GET['page'])){
    $page = $_GET['page'];

} else{
    /* Display First Page by Default */
    $page = 1;
};

$offset = ($page - 1) * $comment_per_page;
$previous_page = $page - 1;
$next_page = $page + 1;
$adjacents = 2;

$limit="LIMIT " . $offset . ", " . $comment_per_page;

$sql = "SELECT u.first_name, u.last_name, c.comment, c.cr_date FROM comment AS c INNER JOIN user AS u ON c.user_id = u.user_id INNER JOIN blog_post AS b ON b.post_id = c.post_id WHERE c.post_id = $id ORDER BY c.comment_id DESC ";

/* Get total number of columns in table */
$result = $db->query($sql);

/* Counting number of rows */
$row_count = $db->affected_rows;

$page_count = ceil($row_count/$comment_per_page);

/* After setting page numbers, then limit results per page */
$query = $sql.$limit;

$stmt = $db->query($query) or die($db->error);

if ($row_count > 0) {
    // output data of each row
    while ($row = $stmt->fetch_assoc()) {
        $name = $row['last_name'] . " " . $row['first_name'];
        $comment = $row['comment'];
        $datetime = $row['cr_date'];
        echo '<div class="detail comment-detail">';
        echo '<div class="author comment-author">' . $name . '</div>';
        echo '<div>' . $datetime . '</div>';
        echo '</div>';
        echo '<div class="comment-content">' . $comment . '</div>';
        echo '<hr>';
    }
};

echo "<ul class='pagination'>";
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

echo '</ul>';