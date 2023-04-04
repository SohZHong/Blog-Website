<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script src="https://kit.fontawesome.com/6a228b1339.js" crossorigin="anonymous"></script>
        <title>Forgot Password?</title>
        <link rel="stylesheet" href="style/forgotpass.css">

    </head>
    <body>
        
        <?php
            session_start();

            require_once '../includes/config.php';

            if (isset($_POST["email"])) {
                $_SESSION["SessionUserEmail"] = $_POST["email"];
                
                $sql = "SELECT `user_email` FROM user WHERE `user_email` = ?";
                $stmt = $db->prepare($sql);
                $stmt->bind_param("s", $_SESSION["SessionUserEmail"]);

                $stmt->execute();
                $stmt -> store_result();

                // If email exists
                if ($stmt->num_rows > 0) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function(){
                            document.getElementById('first').style.display = 'none';
                            document.getElementById('second').style.display = 'block';
                        });
                        </script>";
                } else {
                        echo '<script>alert("Invalid Email! Please Try Again!")</script>';
                }
            }

            if (isset($_POST["securityquest"])&&($_POST["securityanswer"])) {
                $question = $_POST["securityquest"];
                $answer = $_POST["securityanswer"];
                $sql = "SELECT * FROM `user` WHERE `user_email` = ? AND `security_quest` = ? AND `security_answer` = ? ";
                $stmt2 = $db -> prepare($sql);
                $stmt2 -> bind_param("sss", $_SESSION["SessionUserEmail"], $question, $answer);
                $stmt2 -> execute();
                $stmt2 -> store_result();
            
                if ($stmt2->num_rows > 0) {
                    echo "<script>
                    document.addEventListener('DOMContentLoaded', function(){
                        document.getElementById('first').style.display = 'none';
                        document.getElementById('second').style.display = 'none';
                        document.getElementById('third').style.display = 'block';
                    });
                    </script>";
                } else {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function(){
                            document.getElementById('first').style.display = 'none';
                            document.getElementById('second').style.display = 'block';
                        });
                        alert('Wrong Security Question/Answer! Please Try Again!');
                        </script>";
                }
            }
            
        ?>

        <div class="container">
            <div class="first" id="first" >
                <div class="uppersec">
                    <img src="images/forgotpass2.png">
                    <h1>Forgot Password?</h1>
                    <h3>No worries! Tell us your registered email to help you reset.</h3>
                </div>
                <div class="content">
                    <form method="post">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <button type="submit">Reset Password</button>
                    </form>
                    <a href="login.html">
                        <i class="fa-solid fa-arrow-left"></i>
                        <p>Back to Login</p>
                    </a>
                </div>
            </div>

            <div class="second" id="second" >
                <div class="securityQ" id="c2">
                    <h2>Please select your security question...</h2>
                    <label>Your Security Question:</label>
                    <form style="width: 100%;" method="POST">
                        <div class="custom-select">
                            <select name="securityquest">
                                <option>--- Selection ---</option>
                                <option value="Q1">In what city were you born?</option>
                                <option value="Q2">What is the name of your favorite pet?</option>
                                <option value="Q3">What is your mother's maiden name?</option>
                                <option value="Q4">What high school did you attend?</option>
                                <option value="Q5">What was the make of your first car?</option>
                            </select>
                        </div>
                            
                        <label for="securityanswer" style="margin: -5px 0 -15px;">Your Security Answer:</label>
                        <input id="securityanswer" type="text" name="securityanswer" placeholder="YOUR SECURITY ANSWER...">

                        <button type="submit" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>
            </div>

            <div class="third" id="third">
                <form onsubmit="return validate_user()" action="../admin/reset-password.php" method="post">
                    
                    <img src="images/resetpass.png">
                    <h1>Reset Password</h1>
                    <div class="chgpass">
                        <input type="hidden" name="email" value="<?php echo $_SESSION["SessionUserEmail"];?>">
                        <label for="password" style="margin-right: 58%;">New Password:</label>
                        <input id="oldpass" type="password" name="password">

                        <label for="newpassord" style="margin-right: 20%;">Re-enter Your New Password:</label>
                        <input id="newpass" type="password" name="newpassword">
                    </div>

                    <button type="submit">Change Password</button>
                </form>
            </div>
        
        <script src="scripts/forgotpass.js"></script>
        <script defer>
            function validate_user(){
                let password = document.getElementById("oldpass");
                let conf_password = document.getElementById("newpass");
                let valid_status = true;
                let statusmsg;

                if(password.value.length < 7){

                    statusmsg = ("Password length must be more than 7 characters!");

                }else{

                    if (password.value != conf_password.value){
                        statusmsg = ("Passwords did not match!");
                    }

                };
                
                if (statusmsg){
                    valid_status = false;
                    alert(statusmsg);
                };

                return valid_status;
            };
        </script>
    </body>
</html>