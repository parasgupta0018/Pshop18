<?php

    ob_start();
    session_start();
    include "includes/dbs.php";

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $mobile = $_POST['phone'];
        $password = $_POST['password'];  
        
        $email = mysqli_real_escape_string($conn,$email);
        $mobile = mysqli_real_escape_string($conn,$mobile);
        $password = mysqli_real_escape_string($conn,$password);

        $email = htmlentities($email);
        $mobile = htmlentities($mobile);
        $password = htmlentities($password);
    
        $sqlin1 = "select * from users where email='$email' or mobile='$mobile'";
        $resin1 = mysqli_query($conn,$sqlin1);

        if(mysqli_num_rows($resin1)>0){
            
            $sqlin = "select * from users where email='$email' and mobile='$mobile'";
            $resin = mysqli_query($conn,$sqlin);
            $rowin = mysqli_fetch_assoc($resin);
            $pass = $rowin['password'];
            if($rowin['status']==1){
                if(password_verify($password,$pass))
                {
                    $_SESSION['login-success'] = "login successfull".$rowin['username_first']." ".$rowin['username_last'];
                    $_SESSION['user'] = $rowin['username_first'] .' '.$rowin['username_lastname'];
                    $_SESSION['userid'] = $rowin['id'];
                    unset($_SESSION['success']);
                    unset($_SESSION['verified']);
                    header("location:home.php");
                    exit();
                }
                else{
                    $_SESSION['login-error'] = "password or email/mobile didn't match";
                    header("location:home.php");
                    exit();
                }
            }
            else{
                $_SESSION['login-error'] = "first verify your email id. A mail has been sent to you for verification.";
                header("location:home.php");
                exit();
            }
        }
        else{
            $_SESSION['login-error'] = "Account doesn't exist! Signup to Create a New Account";
            header("location:home.php");
            exit();
        }
    }
?>