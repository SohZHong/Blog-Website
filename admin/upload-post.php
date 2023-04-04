<?php
    require_once ("../includes/config.php");
    session_start();
    $statusMsg = NULL;

    $picName = basename($_FILES['pic']['name']);
    $picSize = $_FILES['pic']['size'];
    $allowedSize = 1024000;

    //Setting size limit for pictures
    if ($picSize <= $allowedSize){
        $target_dir = "../assets/uploads/";
        $target_file = $target_dir.$picName;

        //Execute only if file is uploaded
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)){

            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];

            $stmt = $db->prepare("INSERT INTO `blog_post` (post_title, post_thumbnail, post_content, user_id, category_id) VALUES (?, ?, ?, ?, ?)");

            $stmt->bind_param("sssss", $title, $picName, $content, $_SESSION['SessionUserID'], $category);
        
            if (!$stmt->execute()) {
                die('Error: ' . mysqli_error($db));
            }
        }else{
            $statusMsg = 'File upload unsuccessful';
        };
    }
    else{
        $statusMsg = 'The image size is too large, please upload an image less than 1MB';
    };

    if ($statusMsg) {
        echo '<script>alert("'.$statusMsg.'");
        window.history.back();
        </script>';
    }
    else {
        if ($_SESSION['SessionRole'] == "admin"){
            echo '<script>alert("Post submitted successfully!"); window.location.href="index.php";
            </script>';
        } else {
            echo '<script>alert("The post is submit to be reviewed!");
            window.location.href = "../assets/blog-home.php";
            </script>';
        }
    };

?>