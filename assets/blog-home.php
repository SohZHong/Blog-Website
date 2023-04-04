<?php
$title = "Blog Home";
$css = "blog-home.css";
$js = '';
include "header.php";         
?>
<main class="main">
    <section class="grid-container">
        <?php include 'sidebar.php'?>
        <div class="content-container">
            <?php
            
            if (isset($_GET['destination'])){
                //Define switch cases for different pages

                $destination = $_GET['destination'];

                switch ($destination){

                    case 'category':
                        include 'blog-category.php';
                        break;

                    default:
                        include 'view-blog.php';
                        break;

                };
            } else {
                include 'view-blog.php';
            }
            ?>
        </div>
    </section>
</main>
<?php
include "footer.php";
?>