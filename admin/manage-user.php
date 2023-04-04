<?php
require_once '../includes/config.php';
$title = "Manage Users";
$js = "";
include "header.php";

//Get all users
$query = "SELECT * FROM `user` ORDER BY `user_id` DESC ";

$stmt = $db->query($query);

?>
    <main class="main">
        <section class="grid-container">
            <?php include 'sidebar.php'?>
            <div>
                <div class="form-wrapper">
                    <form method="get">
                        <input type="submit" name="action" class="neutral-btn" value="Add New Users">
                        <input type="submit" name="action" class="neutral-btn" value="Manage Users">
                    </form>
                </div>
                <?php
                    echo '<section class="row-container">';
                    //Set default to manage function
                    if ((isset($_GET['action'])) && $_GET['action'] == 'Add New Users'){
                        
                        include ("user_form.html");

                    }elseif ((isset($_GET['action'])) && $_GET['action'] == 'Edit'){
                        
                        include ("edit-user.php");
                    }
                    else{
                        
                        //Get the number of rows in the result set
                        if ($stmt->num_rows != 0){
                            echo '<h2>Manage Users</h2>';
                            echo '<table>';
                            echo '<tr>';
                            echo '<th>Email</th>';
                            echo '<th>Password</th>';
                            echo '<th>Name</th>';
                            echo '<th>Role</th>';
                            echo '<th>Action</th>';
                            echo '</tr>';
                            while ($row = $stmt->fetch_assoc()){
                                
                                echo "<tr>";
                                echo '<td>' . $row['user_email'] . '</td>';

                                echo '<td>' . $row['user_password'] . '</td>';

                                echo '<td>' . $row['last_name']." ".$row['first_name'] . '</td>';

                                echo '<td>' . $row['user_role'] . '</td>';

                                echo '<td>';
                                echo '<form method="get">';
                                echo '<input type="text" hidden name="id" value="'.$row["user_id"].'"/>';
                                echo '<input type="submit" class="green-btn" name="action" value="Edit" />';
                                echo '</form>';
                                echo '</td>';

                                echo '<td>';
                                echo '<form action="delete-user.php" method="get">';
                                echo '<input type="text" hidden name="id" value="'.$row["user_id"].'"/>';
                                echo '<input type="submit" class="red-btn" value="Delete" />';
                                echo '</form>';
                                echo '</td>';

                                echo "</tr>";
                            };
                            echo '</table>';
                            }else{
                                echo 'No user records found';
                            };
                        
                        //use mysqli_kill() function before mysqli_close() to actually close and free up the tcp socket being used by PHP
                        $thread = $db->thread_id;
                        $db->kill($thread);
                        $db->close();
                    }
                echo '</section>';

                ?>
            </div>
        </section>
    </main>
</body>