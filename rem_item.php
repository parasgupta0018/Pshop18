    
    <?php 
        ob_start();
        session_start();
        include './includes/dbs.php';

        if(isset($_POST['remove']))
        {
            $title = $_POST['remove'];
            $sqlr = "select * from products where product_name='$title'";
            $resr = mysqli_query($conn,$sqlr);
            $rowr = mysqli_fetch_assoc($resr);
            
            /*for($x=0;$x<count($_SESSION['product']);$x++)
            {
                if($_SESSION['product'][$x]==$rowr['product_id']){array_splice($_SESSION['product'],$x,1);$x;}
            }*/
            foreach($_SESSION['product'] as $x => $x_value) 
            {
                if($x==$rowr['product_id']){$_SESSION['product'][$x]="0";}
            }
            /*if($check==0){$_SESSION['product']->append($rowf['product_id']); echo '1';}
            else{ echo '0';*/
                /*?>
                <script>
                    swal({
                        title: "This item is already added to the cart!",
                        icon:"info"
                    });</script>
                <?php*/
            //}   
        }
        if(isset($_POST['quantity']) && (isset($_POST['qt']))){
            $qtitle = $_POST['qt'];
            $sqlq = "select * from products where product_name='$qtitle'";
            $resq = mysqli_query($conn,$sqlq);
            $rowq = mysqli_fetch_assoc($resq);
            /*for($x=0;$x<count($_SESSION['product']);$x++)
            {
                if($_SESSION['product'][$x]==$rowr['product_id']){array_splice($_SESSION['product'],$x,1);echo $x;}
            }*/
            foreach($_SESSION['product'] as $x => $x_value) 
            {
                if($x==$rowq['product_id']){$_SESSION['product'][$x] = $_POST['quantity'];}
            }
        }
    
    if(isset($_POST['purchase'])){
            
        
        foreach($_SESSION['product'] as $x => $x_value)
        {
            if($x!=0){if($x_value!=0){
            $sqlp = "select * from products where product_id='$x'";
            $resp = mysqli_query($conn,$sqlp);
            $rowp = mysqli_fetch_assoc($resp);
            $order_date = date("Y-m-d");
            $price = $rowp['price'];
            if(isset($_SESSION['userid'])){$userid = $_SESSION['userid'];
            $sqlo = "insert into orders (product_id,quantity,total_price,user_id,order_date) values ('$x','$x_value','$price','$userid','$order_date')";
            $reso = mysqli_query($conn,$sqlo);}
            }}
        }
        if($_SESSION['no_of_items']!=0){if(isset($_SESSION['userid'])){echo '1';}else{echo '2';}}
        else echo '0';
        
    }
?>       
