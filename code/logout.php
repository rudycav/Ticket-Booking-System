<?php

session_start();

if(isset($_SESSION['user_email'])){
    session_destroy();
    header("Location: login.html");
    exit();
} else {
    header("location: login.html");
    exit();
}
