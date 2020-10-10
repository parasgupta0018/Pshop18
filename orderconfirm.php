<?php
        include './includes/dbs.php';
        include './includes/header.php';
        $mail = '<h4>ORDER DETAILS:<br /></h4><table border=1>';
        $firstname = $_SESSION['user'];
        $i = $_SESSION['userid'];
        $s = "select * from users where id='$i'";
        $re = mysqli_query($conn,$s);
        $ro = mysqli_fetch_assoc($re);
        $email = $ro['email'];
        $imgarray = array();
        foreach($_SESSION['product'] as $x => $x_value)
        {
            if($x!=0)
            {
                if($x_value!=0)
                {
                    $sqlp = "select * from products where product_id='$x'";
                    $resp = mysqli_query($conn,$sqlp);
                    $rowp = mysqli_fetch_assoc($resp);
                    $order_date = date("Y-m-d");
                    $price = $rowp['price'];
                    if(isset($_SESSION['userid']))
                    {   $userid = $_SESSION['userid'];
                        //$sqlo = "insert into orders (product_id,quantity,total_price,user_id,order_date) values ('$x','$x_value','$price','$userid','$order_date')";
                        //$reso = mysqli_query($conn,$sqlo);}
                        //$oid = $_SESSION['userid'];
                        //$sqlorder = "select * from orders where user_id='$oid' order by order_id desc";
                        //$resorder = mysqli_query($conn,$sqlorder);
                        
                        //if(mysqli_num_rows($resorder)>0){
                        //while($roworder = mysqli_fetch_assoc($resorder)){
                        $image = $rowp['image'];
                        $product_name = $rowp['product_name'];
                        $seller = $rowp['seller'];
                        $quantity = $x_value;
                        /*$order_id = $roworder['order_id'];
                        $order = $roworder["product_id"]; 
                        $sqlop = "select * from products where product_id='$order'";
                        $resop = mysqli_query($conn,$sqlop);
                        $rowop = mysqli_fetch_assoc($resop);
                        $image = $rowop["image"];
                        $product_name = $rowop["product_name"];
                        $seller = $rowop["seller"];
                        $quantity =  $roworder["quantity"]; 
                        $total_price = $roworder["total_price"];
                        $order_date = $roworder["order_date"];*/
                        $price = $rowp['price'];
                        $total_price = $x_value * $price;
                        array_push($imgarray, $image);
                        $mail.='<tr class="card bg-light row" style="border: 1px solid black !important">
                                    <td class="card-body col s3" style="padding-left: 5px">
                                        <img class="order-img col-sm-2" style="width:70px; height:70px" src="cid:'.$image.'">
                                    </td>   
                                    <td class="col s3" style="padding-left: 5px">    
                                        <div class="pt-4" style="font-size: 0.8rem"><b>'.$product_name.'</b></div>
                                        <div class="text-left" style="font-size: 0.7rem">Seller : '.$seller.'</div>
                                    </td>
                                    <td class="col s3" style="padding-left: 5px">
                                        <div class="pt-4 col-sm-2" style="font-size: 0.7rem"><b>QTY: '.$quantity.'</b></div><br/>
                                        <div class="pt-4 col-sm-3" style="font-size: 0.7rem">PRICE:₹'.$price.'</div>
                                    </div>
                                    <td class="col s3" style="padding-left: 5px">
                                        <div class="card-text text-left col-6 col-sm-6" style="font-size: 0.7rem">ORDERED on:<br />'.$order_date.' </div>
                                        <div class="card-text text-right col-6 col-sm-6" style="font-size: 0.8rem"><b>TOTAL PRICE: ₹'.$total_price.'</b></div>
                                    </td>
                                </tr>';
                    }
                }
            }
        }

  //  }}

        $base_url = "http://localhost/pshop18/";
        $mail_body = "
        <style type='text/css'>
        .row .col.s3 {
            width: 25%;
            margin-left: auto;
            left: auto;
            right: auto;
          }
          
            .card {
                position: relative;
                margin: 0.5rem 0 1rem 0;
                background-color: #fff;
                -webkit-transition: -webkit-box-shadow .25s;
                transition: -webkit-box-shadow .25s;
                transition: box-shadow .25s;
                transition: box-shadow .25s, -webkit-box-shadow .25s;
                border-radius: 5px;
            }
            
            .card .card-title {
                font-size: 24px;
                font-weight: 300;
            }
        </style>
        <h3>Hi ".$firstname.",</h3>
        <h4>Thanks for Purchase. Your order will be delivered soon.</h4>
        ".$mail."</table><h4>Best Regards,<br />PSHOP18</h4>";
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
        $mail->Username = 'bhaigupta0018@gmail.com';
        $mail->Password = 'paras&bhai';
        $mail->setFrom('bhaigupta0018@gmail.com');
        $mail->FromName = 'pshop18';
        $mail->addAddress($email);
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);   
        $mail->Subject = 'Order Confirmation';   //Sets the Subject of the message
        $mail->Body = $mail_body;       //An HTML or plain text message body
        foreach($imgarray as $i){
            $mail->AddEmbeddedImage('./includes/images/'.$i.'', $i);
        }
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {   
            echo $mail_body;
            echo 'sent';
        }
        else{
            echo "not sent";
        }

        if(isset($_SESSION['userid'])){
            $_SESSION['product'] = array(0 => '0');
            $_SESSION['no_of_items'] = 0;}
?>