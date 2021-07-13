<?php
$base_url = "http://localhost/pshop18/";
$mail_body = "
<p>Hi ".$firstname.",</p>
<p>Thanks for Registration. You will be able to shop and access other services only after your email verification.</p>
<p>Please Open this link to verify your email address - ".$base_url."verify.php?activation_code=".$code."
<p>Best Regards,<br />PSHOP18</p>
";
//require '/home/paras/vendor/autoload.php';
require "/opt/lampp/htdocs/pshop18/PHPMailer/src/Exception.php";
require "/opt/lampp/htdocs/pshop18/PHPMailer/src/PHPMailer.php";
require "/opt/lampp/htdocs/pshop18/PHPMailer/src/SMTP.php";

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->FromName = 'pshop18';
$mail->addAddress($email);
$mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);   
$mail->Subject = 'Email Verification';   //Sets the Subject of the message
$mail->Body = $mail_body;       //An HTML or plain text message body
if($mail->Send())        //Send an Email. Return true on success or false on error
{
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
}
else{
    echo "not sent";
}
?>
