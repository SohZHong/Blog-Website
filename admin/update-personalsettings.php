<?php
    include("../includes/config.php");
    include("../includes/session.php");

    $statusMsg = '';

    $id=$_SESSION['SessionUserID'];

    $titlecharacter = 50;
    $bioscharacter = 200;

    // Retain 
    if (empty($picName)){

        $query = $db->prepare("SELECT `user_profile` FROM `user` WHERE user_id= ?");
        $query->bind_param("s", $id);
        $query->execute();
        $query->store_result();
        $query->bind_result($picName);
        $query->fetch();

    };

    if ((strlen($_POST['usertitle']) <= $titlecharacter)){

        if ((strlen($_POST['userbios']) <= $bioscharacter)){

            $picName = basename($_FILES['profilepic']['name']);

            $target_dir = "../assets/profilepic/";
            $target_file = $target_dir.$picName;

            if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)){
                $fname = $_POST["firstname"];
                $lname = $_POST["lastname"];
                $title = $_POST["usertitle"];
                $bios = $_POST["userbios"];
    
                $stmt = $db->prepare("UPDATE `user` SET `user_profile`= ?, `first_name`= ?, `last_name`= ?, `user_title`=?, `user_bios`=? WHERE `user_id`= ?");
    
                $stmt->bind_param("ssssss", $picName, $fname, $lname, $title, $bios, $id);
    
                $stmt->execute();
            } else {
                $statusMsg = 'File upload unsuccessful!';
            }


        }
        else{
            $statusMsg = 'The biography is too long, please use less than 200 character';
            
        };
    }
    else{
        $statusMsg = 'The self-proclaimed title is too long, please use less than 50 character';
    };

    if ($statusMsg) {
        echo '<script>alert("'.$statusMsg.'");
        window.history.back()";
        </script>';
    }
    else {
        echo '<script>alert("The data is updated!");
        window.location.href="../assets/blog-home.php";
        </script>';
    };
?>