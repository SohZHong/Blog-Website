<?php
require_once '../includes/config.php';
$title = "Manage Feedback";
$js = "";
include "header.php";

//Get all feedback
$query = "SELECT * FROM `support` ORDER BY `sup_id` DESC ";

$stmt = $db->query($query);

?>

<body>
    <main class="main">
        <section class="grid-container">
            <?php include 'sidebar.php' ?>
            <div>

                <?php
                
                $count = 0;

                echo '<section class="row-container">';

                //Get the number of rows in the result set
                if ($stmt->num_rows > 0) {
                    echo '<h2>Manage Feedback</h2>';
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>No. </th>';
                    echo '<th>Name</th>';
                    echo '<th>Email</th>';
                    echo '<th>Contact Number</th>';
                    echo '<th>Subject</th>';
                    echo '<th>Description</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    while ($row = $stmt->fetch_assoc()) {

                        $count += 1;

                        echo "<tr>";

                        echo "<tr>";
                        echo '<td>' . $count . '</td>';

                        echo '<td>' . $row['name'] . '</td>';

                        echo '<td>' . $row['email'] . '</td>';

                        echo '<td>' . $row['contact_number'] . '</td>';

                        echo '<td>' . $row['subject'] . '</td>';

                        echo '<td>' . '<div style="word-wrap: break-word;width: 500px;">' . $row['description'] . '</div>' . '</td>';

                        echo '<td>';
                        echo '<form action="delete-feedback.php" method="get">';
                        echo '<input type="text" hidden name="id" value="' . $row["sup_id"] . '"/>';
                        echo '<input type="submit" class="red-btn" value="Delete" />';
                        echo '</form>';
                        echo '</td>';

                        echo "</tr>";
                    };
                    echo '</table>';
                } else {
                    echo 'No feedbacks found';
                };

                //use mysqli_kill() function before mysqli_close() to actually close and free up the tcp socket being used by PHP
                $thread = $db->thread_id;
                $db->kill($thread);
                $db->close();

                echo '</section>';

                ?>
            </div>
        </section>
    </main>
</body>