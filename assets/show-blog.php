<?php
    include("../includes/config.php");

    //Prevent errors during redirects
    if (isset($_GET['post'])){
        $id=$_GET['post'];
    } else {
        $id = NULL;
    }


    $query = $db->prepare("SELECT b.user_id, b.post_title, b.post_thumbnail, b.post_content, b.post_created, b.post_status, b.views, u.first_name, u.last_name FROM blog_post b INNER JOIN user u ON b.user_id = u.user_id WHERE b.post_id= ? ");
    $query->bind_param("i", $id);
    $query->execute();
    $query->store_result();
    $query->bind_result($userid, $title, $picName, $content, $date, $status, $views, $fname, $lname);
    $query->fetch();

    // Prevent pending posts from increasing view count
    if ($status == 1){
        $stmt = $db->prepare("UPDATE `blog_post` SET `views` = `views` + 1 WHERE `post_id`= ? ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    $css = "show-blog.css";
    $js = "";
    
    $name = $lname." ".$fname;

    include("header.php");
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
            <div class="content-details">
                <h1 class="title"><?php echo $title?></h1>
                <div class="detail">
                    <div class="author">Posted by <a href="user-home.php?user=<?php echo $userid ?>"><?php echo $name?></a></div>
                    <div> Posted on <?php echo $date?> </div> 
                    <div> Total Views: <?php echo $views?> </div>
                </div>
            </div>

            <div class="content-thumbnail flex-center">
                <img src="uploads/<?php echo $picName?>">
            </div>
            <div class="content"><p> <?php echo $content?></p></div>

            <div class="content-thumbnail comments-container">
                <h1 class="title"><?php echo 'Comments' ?></h1>
                <form action="../admin/upload-comment.php" method="POST">
                    <textarea class="comment" placeholder="Type your comment here." name="comment" maxlength="100"></textarea>
                    <?php echo '<input type="hidden" name="postID" value="' . $id . '">' ?>
                    <?php echo '<input type="hidden" name="userID" value="' . $userid . '">' ?>
                    <input type="submit" name="submit" value="Send" class="submitBtn">
                </form>

                <?php
                
                include ("show-comment.php");

                ?>
            </div>
        </div>
    </section>
</main>
<?php
include "footer.php";
?>