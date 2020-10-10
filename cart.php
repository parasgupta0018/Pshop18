
<?php 
    include "./includes/header.php";
    include "./includes/modal.php";

?>
<div class="navbar-fixed">
<?php
    include "./includes/navbar.php";
?>
</div>
<div class="cart text-center pt-5 pb-5" id="cart">
                <h2 class="section-header text-center">CART</h2>
                
                <table class="table table-striped row">
                    
                    <thead class="header-row col-12 col-sm-12 row table-dark">
                        <tr class="head-row row col-12 col-sm-12">
                            <td class="thead-content text-center col-sm-5" style="width: 45%">ITEM DETAILS</td>
                            
                            <td class="thead-content text-center col-sm-2" style="width: 20%">QUANTITY</td>
                            
                            <td class="thead-content text-center col-sm-2" style="width: 20%">PRICE</td>
                            
                            <td style="width: 15%" class="col-sm-3"></td>
                        </tr>
                    </thead>
                    <tbody class="row col-12 col-sm-12">
                    <?php 
                        if(isset($_SESSION['product']))
                        {
                            foreach($_SESSION['product'] as $x => $x_value) {if($x!=0){ if($x_value!=0){
                            
                                $id = $x;
                                $sqlc = "select * from products where product_id = '$id'";
                                $resc = mysqli_query($conn,$sqlc);
                                $rowc = mysqli_fetch_assoc($resc); 
                            ?>
                            <tr class="add-item row col-12 col-sm-12">
                                <td class="detailItem row col-12 col-sm-5">
                                    <img src="./includes/images/<?php echo $rowc['image'] ?>" class="addCartImg col-3 m-0" />
                                    <div class="cart-title1 col-9"><?php echo $rowc['product_name'] ?></div>
                                </td>
                                <td class="cart-quantity row col-4 col-sm-2">
                                    <p class="col-6 pt-2 hide-on-med-and-up">Qty: </p>
                                    <input type="number" value="<?php echo $x_value ?>" class="cart-quantity-input col-6 col-sm-12">
                                </td>
                                <td class="cart-price col-4 col-sm-2">₹<?php echo $rowc['price'] ?></td>
                                <td class="remove-button col-4 col-sm-3 center">
                                    <button class="btn-danger btn">REMOVE</button>
                                </td>
                            </tr>    
                    <?php   }}}
                        }
                    ?>
                    </tbody>
                    <tfoot class="footer-row row col-12 col-sm-12">
                        <tr class="foot-row row col-12 col-sm-12">
                            <td class="tfoot-content col-7" colspan="2">TOTAL PRICE : </td>
                            <td class="text-center tfootprice col-2">₹0</td>
                            <td style="width: 15% col-3"></td>
                        </tr>
                    </tfoot>
                    
                    <!--
                        <tr class="add-item">
                            <td class="detailItem">
                                <a href="#MEN'S T-Shirt White">
                                    <img src="file:///media/paras/047C54BD7C54AB66/Users/paras/Desktop/Desktop/ht5/cart/Images/tshirt.png" class="addCartImg">
                                </a>
                                <a href="#MEN'S T-Shirt White">
                                    <div class="cart-title1">MEN'S T-Shirt White</div>
                                </a>
                            </td>
                            <td class="cart-quantity"><input type="number" value="1" class="cart-quantity-input"></td>
                            <td class="cart-price">₹299</td>
                            <td class="remove-button">
                                <button class="btn-danger btn btn-primary">REMOVE</button>
                            </td>
                    </tr>
                    -->
                    
                </table>
                
                <button class="btn btn-success btn-large btn-purchase justify-content-center" type="button">PURCHASE</button>
                    </div>


<?php include "./includes/footer.php";?>    
<script src="./js/cart.js"></script> 