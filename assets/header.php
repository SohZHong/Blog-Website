<?php
include ("../includes/session.php");
include("../includes/config.php");

$userID = $_SESSION['SessionUserID'];

$sql = $db->prepare("SELECT `notification` from user WHERE user_id = ?");
$sql->bind_param("i", $userID);
$sql->execute();
$sql->store_result();
$sql->bind_result($noti);
$sql->fetch();

?>

<html>
<head>
    <title>
        <?php echo $title ?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/<?php echo $css ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5338b396e1.js" crossorigin="anonymous"></script>
    <script defer src="scripts/<?php echo $js?>"></script>
</head>
<body>
    <script defer>
        /* When the user clicks on the button, toggle between hiding and showing the dropdown content */
        function showDrop(id) {
            document.getElementById(id).classList.toggle("drop");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropmenu')) {
            var dropdowns = document.getElementsByClassName("dropcontent");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('drop')) {
                openDropdown.classList.remove('');
            }
            }
            }
        }
    </script>
    <header class="hero-header flex-center">
        <div class="header-left flex-center">
            <a href="index.php" class="header-logo flex-center">
                <img src="images/Logo.png" alt="company_logo"/>
                <div>AgriLah!</div>
            </a>
            <div class="header-create flex-center">
                <button class="blog-create flex-center" onclick="window.location='post-blog.php';">
                    <i class="fa fa-circle-plus"></i>
                    <span>Create Blog</span>
                </button>
            </div>
        </div>
        <div class="header-middle flex-center">
            <div class="header-search-form flex-center">
                <!-- Displaying user query in search bar -->
                <form action="../assets/blog-home.php?>" method="get">
                    <label for="q">
                        <i class="fa fa-magnifying-glass"></i>
                    </label>
                    <input type="text" id="header-search-bar" name="q" placeholder="Search AgriLah!"/>
                </form>
            </div>
        </div>
        <div class="header-right flex-center">
            <div class="header-selection flex-center">
                <a href="blog-home.php">Blog</a>
                <a href="support-user.php">Support</a>
                <div>
                    <button onclick="showDrop('bell-drop')" class="dropmenu fa fa-bell"></button>

                    <div id="bell-drop" class="dropcontent">
                    
                    <?php
                    // output data of each row
                    $stmt = $db->prepare("SELECT * FROM `comment` c INNER JOIN `blog_post` p ON c.`post_id` = p.`post_id` WHERE p.`user_id` = ? AND c.`status` = 1");
                    $stmt->bind_param("i", $userID);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if($result->num_rows > 0) {
                        //$sql = "UPDATE user SET notification = 0 WHERE user_id = $userID";
                        while ($row = $result->fetch_assoc()) {
                            echo '<form action="../admin/delete-notification.php" method="POST">';
                            echo '<input type="hidden" name="post" value="'.$row["post_id"].'">';
                            echo '<input type="hidden" name="user" value="'.$row["user_id"].'">';
                            echo '<input type="hidden" name="id" value="'.$row["comment_id"].'">';
                            echo '<button>'.$row["comment"].'</button>';
                            echo '</form>';
                        };
                    } else {
                        echo '<div>No Pending Notifications</div>';
                    }
                    ?>
                    </div>
                </div>

                <div>
                    <button onclick="showDrop('profile-drop')" class="dropmenu fa fa-user"></button>
                    <div id="profile-drop" class="dropcontent">
                        <a href="psetting.php">Account Settings</a>
                        <a href="user-home.php?user=<?php echo $userID; ?>">Personal Blog</a>
                        <a href="support-user.php">Provide Feedback</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
