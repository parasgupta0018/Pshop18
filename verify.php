<?php
ob_start();
session_start();
include './includes/dbs.php';

$decide=-1;
$messages = '<p class="text-success">Your Email Address is Successfully Verified </p>';
$messagei = '<p class="text-info">Your Email Address Already Verified</p>';
$messaged = '<p class="text-danger">Invalid Link</p>';;
            

if(isset($_GET['activation_code']))
{
    $acode = $_GET['activation_code'];
 $query = "select * from users where activation_code = '$acode'";
  $resy = mysqli_query($conn,$query);
 
 if(mysqli_num_rows($resy) > 0)
 {

    while($row = mysqli_fetch_assoc($resy))
    {
        if($row['status'] == 0)
        {   $uid = $row['id'];
            //echo $uid;
            $update_query = "update users set status = '1' where id = '$uid'";
            $update_res = mysqli_query($conn,$update_query);
            if($update_res)
            {
                $_SESSION['verified'] = 'yes';
                $messages = '<p class="text-success">Your Email Address Successfully Verified </p>';
                $decide =1;
            }
        }
        else
        {
            $messagei = '<p class="text-info">Your Email Address Already Verified</p>';
            $decide=0;
        }
    }
 }
 else
 {
  $messaged = '<p class="text-danger">Invalid Link</p>';
  $decide=-1;
 }

}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>PHP Register Login Script with Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <div class="container">
   <!--<h1 style="align:center">PHP Register Login Script with Email Verification</h1>-->
  
   <h3></h3>
   
  </div>
  <script src="./css/Sweet Alert/sweetalert.min.js"></script>
  <script type="text/javascript">
    var success = '<? echo $messages?>';
    var info = '<? echo $messagei?>';
    var danger = '<? echo $messaged?>';
    var decide = '<? echo $decide?>';
    
    if(decide == 1){
        var span = document.createElement("span");
        span.innerHTML = success;
        swal({
            content: span,
            text: "you can now login !",
            icon: "success",
            button: "LOGIN NOW",
        }).then((value) => {
            window.location.href = './home.php';
        });
    }
    else if(decide == 0){
        var span = document.createElement("span");
        span.innerHTML = info;
        swal({
            content: span,
            icon: "info",
            buttons: false,
        });
    }
    else if(decide == -1){
        var span = document.createElement("span");
        span.innerHTML = danger;
        swal({
            content: span,
            text: "check the link sent to your mail!",
            icon: "error",
            buttons: false,
        });
    }

  </script>
 </body>
 
</>