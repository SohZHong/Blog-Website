<?php
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>test</title>
  <link rel="stylesheet" href="style/security-quest.css">
  <script src="https://kit.fontawesome.com/6a228b1339.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container2" id="container2">
    <div class="securityQ" id="c2">
      <h2>In Case You Forget Your Password...</h2>
      <label>Please Select one Security Question to Answer</label>
      <form style="width: 100%;" action="../admin/redirect-user.php" method="post">
        <input type="hidden" name="action" value="register">
        <input type="hidden" name="fname" value="<?php echo $firstname ?>">
        <input type="hidden" name="lname" value="<?php echo $lastname ?>">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="password" value="<?php echo $password ?>">
        <div class="custom-select">
          <select name="securityquest" required>
            <option value="">--- Selection ---</option>
            <option value="Q1">In what city were you born?</option>
            <option value="Q2">What is the name of your favorite pet?</option>
            <option value="Q3">What is your mother's maiden name?</option>
            <option value="Q4">What high school did you attend?</option>
            <option value="Q5">What was the make of your first car?</option>
          </select>
        </div>
        
        <label for="securityanswer" style="margin: -5px 0 -15px;">Security Answer:</label>
        <input id="securityanswer" type="text" name="securityanswer" placeholder="YOUR SECURITY ANSWER..." required>

        <button type="submit" style="margin-top: 20px;">Submit</button>
      </form>

    </div>
  </div>
<script src="scripts/security-quest.js"></script>
</body>

</html>