<?php
    ob_start();
    session_start();
    include "includes/dbs.php";

    if(isset($_POST['signup']))
    {
        $firstname = $_POST['firstname'];    
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['phone'];
        $password = $_POST['password'];  
    
        $firstname = mysqli_real_escape_string($conn,$firstname);    
        $lastname = mysqli_real_escape_string($conn,$lastname);
        $email = mysqli_real_escape_string($conn,$email);
        $mobile = mysqli_real_escape_string($conn,$mobile);
        $password = mysqli_real_escape_string($conn,$password);

        $firstname = htmlentities($firstname);    
        $lastname = htmlentities($lastname);
        $email = htmlentities($email);
        $mobile = htmlentities($mobile);
        
        $password = htmlentities($password);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "select * from users where email='$email' or mobile='$mobile'";
        $res= mysqli_query($conn,$sql);

        if($res){

            if(mysqli_num_rows($res)>0){
                $_SESSION['error'] = "Account already exists !!";
                header("location:home.php");
                exit();
            }
            else{
                $code = md5(rand());
                $sql1 = "insert into users(username_first,username_last,email,mobile,password,activation_code) values('$firstname','$lastname','$email','$mobile','$password','$code')";
                $resup = mysqli_query($conn,$sql1);
                    
                    if($resup){
                        $_SESSION['success'] = "Welcome! $firstname $lastname to the Pshop18 Family!!. A verification email has been sent to your registered email: $email . Click on the verification link to verify your email ID. Once verified login to enjoy our services.";
                        include './sendmail.php';
                        header("location:home.php");
                        exit();
                        /*  $_SESSION['user'] = $firstname.' '.$lastname ;

                        $sql2 = "select * from users where email='$email' limit 1";
                        $res2 = mysqli_query($conn,$sql2);
                        $row1 = mysqli_fetch_assoc($res2);
                        $_SESSION['userid'] = $row1['id'];
                        
                        header("location:home.php");
                        exit();*/
                    }
                    else{
                        $_SESSION['error'] = "query didn't work in result";
                        header("location:home.php");
                        exit();
                    }
            }
        }
        else{
            $_SESSION['error'] = "query didn't work in res";
            header("location:home.php");
            exit();
        }
        
    }
?>