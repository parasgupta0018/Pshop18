    
    <?php 
        ob_start();
        session_start();
        include './includes/dbs.php';

        if(isset($_POST['count'])){
            $_SESSION['no_of_items'] = $_POST['count'];
        }

        
        
        if(isset($_POST['data']))
        {
            $title = $_POST['data'];
            $sqlf = "select * from products where product_name='$title'";
            $resf = mysqli_query($conn,$sqlf);
            $rowf = mysqli_fetch_assoc($resf);
            $check=0;
            foreach($_SESSION['product'] as $x => $x_value) {
    
                if($x == $rowf['product_id']){if($x_value!=0){$check++;}}
            }
            if($check==0){$_SESSION['product'][$rowf['product_id']] = "1"; echo '1';}
            else{ echo '0';
            /*for($x=0;$x<count($_SESSION['product']);$x++)
            {
                if($_SESSION['product'][$x]==$rowf['product_id']){$check++;}
            }
            if($check==0){array_push($_SESSION['product'],$rowf['product_id']); echo '1';}
            else{ echo '0';*/
                /*?>
                <script>
                    swal({
                        title: "This item is already added to the cart!",
                        icon:"info"
                    });</script>
                <?php*/
            }   
        }
    ?>
