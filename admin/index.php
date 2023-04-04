<?php
require_once '../includes/config.php';
$title = "Admin Homepage";
$js = "";
include "header.php";

//Get all pending posts
$query = "SELECT * FROM `blog_post` p INNER JOIN `user` u ON p.`user_id` = u.`user_id` WHERE p.`post_status`=0 ORDER BY p.`post_id` DESC";


$stmt = $db->query($query);

?>
    <main class="main">
        <section class="grid-container">
            <?php include 'sidebar.php'?>
            <div>
                <div class="form-wrapper">
                    <div>
                        <button class="neutral-btn" onclick="location.replace('../assets/post-blog.php');">Add New Posts</button>
                    </div>
                </div>
                <?php
                    echo '<section class="row-container">';
                    //Get the number of rows in the result set
                    if ($stmt->num_rows != 0){
                        
                        echo '<h2>Manage Posts</h2>';
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Title</th>';
                        echo '<th>Author</th>';
                        echo '<th>Posted Date</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';
                        while ($row = $stmt->fetch_assoc()){
                            echo "<tr>";
                            echo '<td>' . $row['post_title'] . '</td>';

                            echo '<td>' . $row['last_name'] ." ". $row['first_name'] . '</td>';

                            echo '<td>' . $row['post_created'] . '</td>';

                            echo '<td>';
                            echo '<form action="../assets/show-blog.php" method="get">';
                            echo '<input type="text" hidden name="post" value="'.$row["post_id"].'"/>';
                            echo '<input type="submit" class="blue-btn" value="View" />';
                            echo '</form>';
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="approve-post.php" method="get">';
                            echo '<input type="text" hidden name="id" value="'.$row["post_id"].'"/>';
                            echo '<input type="submit" class="green-btn" value="Approve" />';
                            echo '</form>';
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="delete-post.php" method="get">';
                            echo '<input type="text" hidden name="id" value="'.$row["post_id"].'"/>';
                            echo '<input type="submit" class="red-btn" value="Reject" />';
                            echo '</form>';
                            echo '</td>';

                            echo "</tr>";
                        };
                        echo '</table>';
                    }else{
                        echo 'No pending posts';
                    };
                    echo '</section>';
                    //use mysqli_kill() function before mysqli_close() to actually close and free up the tcp socket being used by PHP
                    $thread = $db->thread_id;
                    $db->kill($thread);
                    $db->close();
                ?>
            </div>
        </section>
    </main>
</body>
</html>