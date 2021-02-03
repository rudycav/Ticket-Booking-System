<?php
include_once ('sign_up.html');
session_start();

if (isset($_POST['submit']))
{

    require 'connect.php';

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['user_email'];
    $pass = $_POST['password'];
    $pass_repeat = $_POST['password_repeat'];

    /*empty input from user*/
    if (empty($first) || empty($last) || empty($email) || empty($pass) || empty($pass_repeat))
    {

        header("Location: sign_up.php");
        echo '<script>alert("Please fill in all fields")</script>';
        exit();
    }

    /*pass is not the same as pass repeat*/
    elseif ($pass !== $pass_repeat)
    {

        header("Location: sign_up.html");
        echo '<script>alert("Passwords do not match")</script>';
        exit();

        /**/
    }
    else
    {
        $sql = "SELECT email FROM user WHERE email=?";
        $statement = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($statement, $sql))
        {

            header("Location: sign_up.html");
            exit();
        }
        /*only 1 email can exist in db*/
        else
        {
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $check = mysqli_stmt_num_rows($statement);
            if ($check > 0)
            {

                header("Location: sign_up.html");
                echo '<script>alert("Email already exists")</script>';
                exit();
            }
            /*insert data to db from customer input*/
            else
            {
                $sql = "INSERT INTO user(first, last, email, pass) VALUES (?, ?, ?, ?)";

                $statement = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($statement, $sql))
                {
                  header("Location: login.html");

                    exit();

                }
                else
                {
                    mysqli_stmt_bind_param($statement, "ssss", $first, $last, $email, $pass);
                    mysqli_stmt_execute($statement);

                    header("Location: login.html");
                  
                    exit();

                }

            }
        }
    }

}
