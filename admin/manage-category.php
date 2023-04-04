<?php
require_once '../includes/config.php';
$title = "Manage Categories";
$js = "";
include "header.php";

//Get all categories
$query = "SELECT * FROM `blog_category` ORDER BY `category_id` DESC ";

$stmt = $db->query($query);

?>
    <main class="main">
        <section class="grid-container">
            <?php include 'sidebar.php'?>
            <div>
                <div class="form-wrapper">
                    <form method="get">
                        <input type="submit" name="action" class="neutral-btn" value="Add New Categories">
                        <input type="submit" name="action" class="neutral-btn" value="Manage Categories">
                    </form>
                </div>
                <?php
                    echo '<section class="row-container">';
                    //Set default to manage function
                    if ((isset($_GET['action'])) && $_GET['action'] == 'Add New Categories'){
                        
                        include ("category_form.html");

                    }elseif ((isset($_GET['action'])) && $_GET['action'] == 'Edit'){

                        include ("edit-category.php");
                    }
                    else{
                        
                        //Get the number of rows in the result set
                        if ($stmt->num_rows != 0){

                            $count = 0;

                            echo '<section class="row-container">';
                            echo '<h2>Manage Categories</h2>';
                            echo '<table>';
                            echo '<tr>';
                            echo '<th>No.</th>';
                            echo '<th>Name</th>';
                            echo '<th>Action</th>';
                            echo '</tr>';
                            while ($row = $stmt->fetch_assoc()){
                                $count += 1;

                                echo "<tr>";

                                echo '<td>' . $count . '</td>';

                                echo '<td>' . $row['category_name'] . '</td>';

                                echo '<td>';
                                echo '<form method="get">';
                                echo '<input type="text" hidden name="id" value="'.$row["category_id"].'"/>';
                                echo '<input type="submit" class="green-btn" name="action" value="Edit" />';
                                echo '</form>';
                                echo '</td>';

                                echo '<td>';
                                echo '<form action="delete-category.php" method="get">';
                                echo '<input type="text" hidden name="id" value="'.$row["category_id"].'"/>';
                                echo '<input type="submit" class="red-btn" value="Delete" />';
                                echo '</form>';
                                echo '</td>';

                                echo "</tr>";
                            };
                            echo '</table>';
                            }else{
                                echo 'No category records found';
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