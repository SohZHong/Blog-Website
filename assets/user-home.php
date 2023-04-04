<?php
$title = "Personal Blog";
$css = "user-home.css";
$js = '';
include "header.php";
include '../includes/config.php';
include '../admin/includes/admin-functions.php';
?>
<main class="main">
    <section class="grid-container">
        <?php 
        include 'sidebar.php';
            
        if (isset($_GET['destination'])){
            //Define switch cases for different pages

            $destination = $_GET['destination'];

            switch ($destination){

                case 'trending':
                    echo '<script>window.location.href = "blog-home.php?destination=trending"; </script>';
                
                case 'category':
                    echo '<script>window.location.href = "blog-home.php?destination=category"; </script>';

                case 'recent':
                    echo '<script>window.location.href = "blog-home.php?destination=recent"; </script>';

                default:
                    echo '<script>window.location.href = "blog-home.php"; </script>';

            };
        };
        ?>
        <div class="content-container">
            <div class="profile-grid">
                <div>
                <?php

                    $link = geturl();

                    if (isset($_GET["sort"])){

                        $sort = $_GET["sort"];

                        switch ($sort) {
                            case 'recent':
                                $order = "post_created";
                                break;
                            
                            case 'popular':
                                $order = "views";
                                break;

                            default:
                                $order = "post_id";
                                break;
                        };
                    } else {
                        $order = "post_id";
                    }

                    if (isset($_GET['sort'])){
                        $sort = $_GET['sort'];
                    } else {
                        $sort = NULL;
                    };

                    $id = $_GET['user'];

                    if ($id == $_SESSION["SessionUserID"]){

                        $query = "SELECT * FROM `blog_category` c INNER JOIN `blog_post` p ON c.`category_id` = p.`category_id` INNER JOIN `user` u ON p.`user_id` = u.`user_id` WHERE u.`user_id`= $id ORDER BY p.`$order` DESC";

                    } else {
                        $query = "SELECT * FROM `blog_category` c INNER JOIN `blog_post` p ON c.`category_id` = p.`category_id` INNER JOIN `user` u ON p.`user_id` = u.`user_id` WHERE p.`post_status`=1 AND u.`user_id`= $id ORDER BY p.`$order` DESC";
                    }

                    $stmt = $db->query($query);

                    $row_count = $stmt->num_rows;
                ?>
                    <div class="filter-container shaded">
                        <div>
                            <a class="sort-btn <?php if ($sort == 'recent'){echo 'active';}?>" href= <?php echo '"'.add_QS($link,"sort","recent").'"' ;?>>
                                <i class="fa-solid fa-certificate"></i>
                                <span>Most recent</span>
                            </a>
                            <a class="sort-btn <?php if ($sort == 'popular'){echo 'active';}?>" href= <?php echo '"'.add_QS($link,"sort","popular").'"' ;?>>
                                <i class="fa-solid fa-fire"></i>
                                <span>All-time views</span>
                            </a>
                        </div>
                    </div>
                    <div class="article-menu shaded">
                        <?php

                            if ($row_count > 0){
                                
                                while ($row = $stmt->fetch_assoc()){

                                    $qs = 'show-blog.php?post='.$row['post_id'].'';

                                    $description = trimstr(300, $row["post_content"], $qs);

                                    echo '<div class="article-menu-items">';
                                    echo '<div class="article-thumbnail">';
                                    echo '<img src="uploads/'.$row["post_thumbnail"].'" alt="'.$row["post_thumbnail"].'" />';
                                    echo '</div>';
                                    echo '<div class="article-content">';
                                    echo '<div class="article-header flex-center">';
                                    echo '<h2><a href="show-blog.php?post='.$row['post_id'].'">'.$row['post_title'].'</a></h2>';
                                    echo '<a class="category-btn" href="blog-home.php?category='.$row["category_name"].'">'.$row["category_name"].'</a>';
                                    if ($row['post_status'] == 0) {
                                        echo '<a class="pending-btn" href="show-blog.php?post='.$row['post_id'].'"> Pending </a>';
                                    }
                                    echo '</div>';
                                    echo '<div class="article-description">';
                                    echo $description;
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                };
                            } else {
                                echo 'This user has not posted any blogs';
                            };

                        ?>
                    </div>
                </div>
                <div class="profile-wrapper shaded">
                    <div class="profile-card flex-center">
                        <?php

                            $stmt = $db->query("SELECT * FROM `user` WHERE `user_id`= ".$_GET['user']."");

                            while ($row = $stmt->fetch_assoc()){
                                echo '<div class="profile-img">';
                                echo '<img src="profilepic/'.$row["user_profile"].'"';
                                echo '" alt="'.$row['last_name'].' '.$row['first_name'].'"/>';
                                echo '</div>';
                                echo '<div class="profile-name center">';
                                echo '<span>'.$row['last_name'].' '.$row['first_name'].'</span>';
                                echo '</div>';
                                echo '<div class="profile-title center">';
                                echo '<span>'.$row['user_title'].'</span>'; //Need change in future USer Title
                                echo '</div>';
                                echo '<div class="profile-bios center">';
                                echo '<span>';
                                echo $row["user_bios"]; //Future Need Change Bios
                                echo '</span>';
                                echo '</div>';

                            };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include "footer.php";
?>