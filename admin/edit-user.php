<?php
require_once '../includes/config.php';

$id=intval($_GET['id']);
$result = $db->query("SELECT * FROM user WHERE user_id=$id");

while($row = $result->fetch_assoc()){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add User</title>
    </head>

    <body>
        <h2>Edit User</h2>
        <h3>Modify account credentials of other users</h3>
        <form class="input-form" onsubmit="return validation()" action="update-user.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row['user_id'];?>"/>
          <input type="hidden" name="action" value="edit"/>
            <div>
                <label for="email">Email *</label>
                <input type="email" name="email" value="<?php echo $row['user_email'];?>" required/>
            </div>
            <div>
                <label for="password">Password *</label>
                <input type="text" id="password" name="password" value="<?php echo $row['user_password'];?>" required/>
            </div>
            <div>
                <label for="fname">First Name</label>
                <input type="text" name="fname" value="<?php echo $row['first_name'];?>"/>
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" name="lname" value="<?php echo $row['last_name'];?>" required/>
            </div>
            <div>
                <label for="role">Role *</label>
                <select name="role" required>
                    <option value="">Please select</option>
                    <option value="admin" <?php if ($row["user_role"] == "admin"){echo "selected";};?> >Administrator</option>
                    <option value="user" <?php if ($row["user_role"] == "user"){echo "selected";};?>>User</option>
                </select>
            </div>
            <div>
                <label for="securityquest">Security Question *</label>
                <select name="securityquest" required>
                    <option value="">--- Selection ---</option>
                    <option value="Q1" <?php if ($row["security_quest"] == "Q1"){echo "selected";};?> >In what city were you born?</option>
                    <option value="Q2" <?php if ($row["security_quest"] == "Q2"){echo "selected";};?> >What is the name of your favorite pet?</option>
                    <option value="Q3" <?php if ($row["security_quest"] == "Q3"){echo "selected";};?>>What is your mother's maiden name?</option>
                    <option value="Q4" <?php if ($row["security_quest"] == "Q4"){echo "selected";};?> >What high school did you attend?</option>
                    <option value="Q5" <?php if ($row["security_quest"] == "Q5"){echo "selected";};?> >What was the make of your first car?</option>
                  </select>
            </div>
            <div>
                <label for="securityanswer">Security Answer *</label>
                <input id="securityanswer" type="text" name="securityanswer" value="<?php echo $row['security_answer'];?>" required>
            </div>
            <div>
                <input type="submit" value="Edit User"/>
            </div>
        </form>

        <script>
            function validation(){
                let user = document.getElementById("username");
                let password = document.getElementById("password");
                let valid_status = true;
                let statusmsg;

                if (user.value.length > 20 || user.value.length < 5){
                    statusmsg = ("Username length must be between 5 to 20 characters!");
                }
                else if(password.value.length < 7){
                    statusmsg = ("Password length must be more than 7 characters!");
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
<?php
};
?>