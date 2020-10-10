<?php 
        ob_start();
        session_start();
        include './includes/dbs.php';

        if(isset($_POST['updt_info'])){

            $firstname = $_POST['firstname'];    
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $mobile = $_POST['phone'];

            $firstname = mysqli_real_escape_string($conn,$firstname);    
            $lastname = mysqli_real_escape_string($conn,$lastname);
            $email = mysqli_real_escape_string($conn,$email);
            $mobile = mysqli_real_escape_string($conn,$mobile);

            $firstname = htmlentities($firstname);    
            $lastname = htmlentities($lastname);
            $email = htmlentities($email);
            $mobile = htmlentities($mobile);

            $userid = $_SESSION['userid'];

            $sqlup = "UPDATE users SET username_first='$firstname', username_last='$lastname', email='$email', mobile='$mobile' WHERE id='$userid'";
            $resup = mysqli_query($conn,$sqlup);
            $_SESSION['user'] = $firstname.' '.$lastname ;
            $_SESSION['success'] = "Profile Information Updated";
            header("location:home.php");
            exit();
        }
        if(isset($_POST['updt_pwd']))
        {
            $cpassword = $_POST['cpassword'];
            $cpassword = mysqli_real_escape_string($conn,$cpassword);
            $cpassword = htmlentities($cpassword);

            $verify = $_SESSION['userid'];
            $sqlv = "select * from users where id='$verify'";
            $resv = mysqli_query($conn,$sqlv);
            $rowv = mysqli_fetch_assoc($resv);
            $check_pwd = $rowv['password'];

            $npassword = $_POST['npassword'];
            $npassword = mysqli_real_escape_string($conn,$npassword);
            $npassword = htmlentities($npassword);
            $npassword = password_hash($npassword, PASSWORD_BCRYPT);


            if(password_verify($cpassword,$check_pwd))
            {
                $userid = $_SESSION['userid'];
                $sqlui = "update users set password = '$npassword' where id='$userid'";
                $resui = mysqli_query($conn,$sqlui);
                $_SESSION['success'] = "Password updated";
                header("location:home.php");
                exit();
            }

        }
?>