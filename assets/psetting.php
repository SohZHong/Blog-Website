<?php
    include("../includes/config.php");

    $title = "Personal Blog";
    $css = "psetting.css";
    $js = 'psetting.js';

    include ("header.php");

    $id=$_SESSION['SessionUserID'];
    $query = "SELECT * FROM `user` WHERE user_id= $id";
    $result= $db->query($query);
    while ($row = $result -> fetch_assoc()){

?>
<main class="main flex-center">
    <form class="settings-container flex-center" action="../admin/update-personalsettings.php" method="post" enctype="multipart/form-data">
        <div class="input-container flex-center">
            <div class="profile_pic flex-center">
                <label for="file">Change Image</label>
                <input class="inputimg" id="file" name="profilepic" type="file" onchange="loadFile(event)" accept="image/jpeg, image/png, image/jpg">
                <img class="picture" src="profilepic/<?php echo $row['user_profile']?>" id="output" width="200px">
            </div>
            <div class="input-field">
                <label>First Name :</label><br>
                <input type = "name" name = "firstname" required value = "<?php echo $row['first_name']?>"><br><br>
            </div>
            <div class="input-field">
                <label>Last Name :</label><br>
                <input type = "name" name = "lastname" required value = "<?php echo $row['last_name']?>"><br><br>
            </div>
            <div class="input-field">
                <label>Self-proclaimed Title :</label><br>
                <input type = "text" name = "usertitle" required value = "<?php echo $row['user_title']?>"><br><br>
            </div>
            <div class="biography input-field">
                <label>Biography :</label><br>
                <textarea name = "userbios"><?php echo $row['user_bios']?></textarea><br><br>
            </div>
            <div>
                <button class="submit-btn">Update</button>
            </div>
        </div>
    </form>
</main>
<?php
    };
include ("footer.php")
?>