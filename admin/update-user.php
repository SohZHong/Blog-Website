<?php
require_once '../includes/config.php';

$password = $_POST["password"];
$email = $_POST["email"];
$lname = $_POST["lname"];
$role = $_POST["role"];
$question = $_POST["securityquest"];
$answer = $_POST["securityanswer"];

//first name is optional
if (!isset($_POST["fname"])){
    $fname = NULL;
}else{
    $fname = $_POST["fname"];
};

//Prevent only whitespaces in input
if (!ctype_space($fname) && !ctype_space($password) && !ctype_space($lname)){

    //When admin adds new users
    if ($_POST['action'] == 'add'){
        $query= "INSERT INTO user (first_name, last_name, user_password, user_email, user_role, security_quest, security_answer) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $insertstmt = $db->prepare($query);
        $insertstmt->bind_param('sssssss', $fname, $lname, $password, $email, $role, $question, $answer);
        
        if ($insertstmt->execute()) {
            echo "<script>alert('User Added Successfully'); window.location.href='manage-user.php?action=Add+New+Users';</script>";
        }
        else {
            die('Error: ' . $db->error);
        };
    
    //When admin edit existing users
    }elseif ($_POST['action'] == 'edit'){
        
        $id = $_POST['id'];

        $query="UPDATE user SET first_name=?, last_name=?, user_password=?, user_email=?, user_role=?, security_quest=?, security_answer=? WHERE user_id= ? ;";

        $editstmt = $db->prepare($query);
        $editstmt->bind_param('ssssssss', $fname, $lname, $password, $email, $role, $question, $answer, $id);

        if ($editstmt->execute()) {
            echo "<script>alert('User Edited Successfully'); window.location.href='manage-user.php';</script>";
        }
        else {
            die('Error: ' . $db->error);
        };
    }

}else{
    echo "<script>alert('Username already exists or input only contains whitespaces! Please try again'); window.history.back();</script>";
};
?>