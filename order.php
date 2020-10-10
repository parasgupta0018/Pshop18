
<?php 
    include "./includes/header.php";
    include "./includes/modal.php";

?>
<div class="navbar-fixed">
<?php
    include "./includes/navbar.php";
?>
</div>
<div class="jumbotron mt-4 bg-light">
    <h2 class="text-center">ORDERS</h2>
<?
    $oid = $_SESSION['userid'];
    $sqlorder = "select * from orders where user_id='$oid' order by order_id desc";
    $resorder = mysqli_query($conn,$sqlorder);
    if(mysqli_num_rows($resorder)>0){
        while($roworder = mysqli_fetch_assoc($resorder)){

?>

    <div class="card bg-light col-12 col-sm-12">
        <div class=" card-header">ORDER-ID : <? echo $roworder['order_id']; ?></div>
        <div class="card-body row m-0">
            <img class="order-img col-sm-2" src="./includes/images/<? $order = $roworder['product_id']; 
                                                                      $sqlop = "select * from products where product_id='$order'";
                                                                      $resop = mysqli_query($conn,$sqlop);
                                                                      $rowop = mysqli_fetch_assoc($resop);
                                                                      echo $rowop['image'];
                                                                      ?>">
            <div class="col-sm-5">    
                <div class="pt-4" style="font-size: 2rem"><? echo $rowop['product_name'];?></div>
                <div class="text-left" style="font-size: 1rem">Seller : <? echo $rowop['seller'];?></div>
            </div>
            <div class="pt-4 col-sm-2" style="font-size: 1.2rem">QUANTITY: <? echo $roworder['quantity']; ?></div>
            <div class="pt-4 col-sm-3" style="font-size: 1.2rem">PRICE: ₹<? echo $roworder['total_price'];?></div>
        </div>
        <div class=" card-footer row" style="width:100%">
            <div class="card-text text-left col-6 col-sm-6">ORDERED ON : <? echo $roworder['order_date'];?></div>
            <div class="card-text text-right col-6 col-sm-6"><b>TOTAL PRICE: ₹<? $total_price = $roworder['quantity'] * $roworder['total_price']; echo $total_price;?></b></div>
        </div>
    </div>
<?
    }}
    else{
        ?>
        <h3>No Orders Yet !!!</h3>
        <?
    }
?>
</div>
<?php include "./includes/footer.php";?>  