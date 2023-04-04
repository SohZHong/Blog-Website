<?php

session_start();

if (!isset($_SESSION['SessionRole'])){
    header("location: login.html");
};

?>