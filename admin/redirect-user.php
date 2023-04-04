<?php
require_once '../includes/config.php';

session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if ($_POST['action'] == 'register'){
    
    $lname = $_POST["lname"];
    $ques = $_POST["securityquest"];
    $ans = $_POST["securityanswer"];

    if (!isset($_POST["fname"])){
        $fname = NULL;
    }else{
        $fname = $_POST["fname"];
    };


    //Prevent input from containing white spaces
    if (!ctype_space($password) && !ctype_space($lname)){

        $verify = $db->prepare("SELECT `user_email` FROM user WHERE `user_email` = ?");

        $verify->bind_param("s", $email);

        $verify->execute();

        $verify->store_result();

        //Email Verification
        if ($verify->num_rows > 0){

            echo "<script>alert('Email has been registered! Please Try Another Email!'); window.location.href='../assets/login.html' </script>";
            
        } else {

            $stmt= $db->prepare("INSERT INTO user (first_name, last_name, user_password, user_email, security_quest, security_answer) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param('ssssss', $fname, $lname, $password, $email, $ques, $ans);
            
            $stmt->execute();
        
            echo "<script>alert('User Registeration Successfully'); window.location.href='../assets/login.html';</script>";

        }



    }else{

        echo "<script>alert('Input only contains whitespaces! Please try again'); window.history.back();</script>";

    }

}elseif ($_POST['action'] == 'login'){
    
    $stmt= $db->prepare("SELECT `user_id`, `user_role` FROM user WHERE `user_email`= ? and `user_password`= ? ");

    $stmt->bind_param('ss', $email, $password);

    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows == 1){
        session_start();

        // bind result to a variable
        $stmt->bind_result($id, $role);
        $stmt->fetch();

        $_SESSION['SessionUserID']=$id;
        $_SESSION['SessionRole']=$role;

        //Define switch cases for redirect
        switch ($role){

            case 'admin':
                header("location:index.php");
                exit();

            case 'user':
                header("location:../assets/blog-home.php");
                exit();

        };
        
    }else{

        echo "<script>alert('Wrong Username or Password'); window.history.back();</script>";
    };
    
    $stmt->close();
};

?>