<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="scripts/homepage.js"></script>
</head>
<body>
    <?php
    session_start();

    //Redirect users that have log in
    if (isset($_SESSION['SessionRole'])){
        header("location: blog-home.php");
    };

    ?>
    <main class="hero">
        <header class="home-header">
            <div id="logo" class="mask">
                <span class="logo-text">AgriLah!</span>
            </div>
            <div id="header" class="mask">
                <a href="blog-home.php">Blog</a>
                <a href="support-nonuser.php">Support</a>
                <a href="login.html" class="header-button">Sign In</a>
                <a href="login.html" class="header-button">Sign Up</a>
            </div>
        </header>
        <div class="content-container">
            <img src="images/homepage_background.png"/>
            <div id="slogan" class="mask">
                <h2>Empowering Agricultural Knowledge</h2>
                <h3>Creating and Sharing Daily Agricultural Tips</h3>
                <button class="nav-down" onclick="document.querySelector('.join-text').scrollIntoView();">Discover </button>
            </div>
        </div>
        <section class="info-container">
            <div class="grid left-slide">
                <div class="container">
                    <img src="images/Hay.png" alt="IDK" class="leftImage">
                    <div class="description">
                        <h2 class="big">Share your knowledge and tips</h2>
                        <div class="small">
                            Create your own personal blog page
                            where you can collaborate, share and talk about agricultural topics
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid right-slide">
                <div class="container">
                    <div class="description">
                        <h2 class="big">Build your interests</h2>
                        <div class="small">
                            New to Agriculture?
                            Browse through tens and hundreds of agriculture-themed topics,
                            expose yourself to unfamiliar knowledge
                        </div>
                    </div>
                    <img src="images/Corn.png" alt="Corn" class="rightImage">
                </div>
            </div>
            <div class="grid left-slide">
                <div class="signup-container flex-center">
                    <div class="join-text">
                        <h2 class="big">Join like-minded People</h2>
                        <div class="small">
                            Be it sharing your techniques, expertise or anything on your mind, AgriLah provides an environment where sharing is made easier. Sign up now to discover people who share the same interests and ideas as you.
                        </div>
                    </div>
                    <a href="login.html" id="reg_btn" class="register small">Get Started</a>
                </div>
            </div>
        </section>
    </main>
<?php
include "footer.php";                
?>