
  <nav>
    <div class="row nav-wrapper bg-dark">
        <!--logo-->
     <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3">
      <div class="logo"><a href="./home.php" class="brand-logo"><img src="./includes/images/download.png"/> </a></div>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger text-white" style="text-decoration : none"><i class="material-icons">menu</i></a>
     </div>
      <!--search bar -->
      <div class="col-7 col-sm-7 col-md-7 col-lg-4 col-xl-4 searchbar">
            <form method="post" action="search.php" class="blue-grey darken-2" autocomplete="off">
                <div class="input-field">
                <input id="search" name="search" type="search" placeholder="search anything" list="search_bar" required>
                <label class="label-icon negative" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons negative hide-on-med-and-down">close</i>
                </div>
            </form>
            <!--navbar suggestions
            <datalist id="search_bar" style="width:100%">
                <option></option>
            </datalist>-->
            
            <ul class="list-group search-drop" id="search_bar">
                
            </ul>
      </div>
      
      <!--navbar content-->
      <div class="col-lg-4 col-xl-4 order-3 hide-on-med-and-down" id="order-nav">
    
      <ul id="nav-mobile" class="right hide-on-med-and-down row" style="width:100%; padding-left:10px">
    
        <li class="col-sm-6 col-lg-6 col-md-6 navtext" id="user_name">
            <?php
                if(isset($_SESSION['user'])){
            ?>
            <a class="dropdown-trigger nav-item text-white bg-dark center" style="text-decoration : none;text-transform:capitalize" href="#!" data-target="dropdown1">

               <?
                   $id = $_SESSION['userid'];
                    $sq = "select * from users where id='$id' limit 1";
                    $re = mysqli_query($conn,$sq);
                    $row2 = mysqli_fetch_assoc($re);
                    if($row2['user_img_blob']==NULL){
            ?>
                <img class="circle mr-3" style="width:35px;height:35px" src="./includes/images/Deafult-Profile-Pitcher.png">
                        <?}else{?><img class="circle mr-3" style="width:35px;height:35px" src="data:image/jpeg;base64,<?echo base64_encode( $row2['user_img_blob'])?>">
                        <?}?>
                        <?php echo $_SESSION['user'] ?><i class="material-icons right">arrow_drop_down</i>
            </a>
            <?php        
                }
                else{
            ?>
            <a class="nav-item text-white bg-dark center modal-trigger" style="text-decoration : none" href="#modal1">
                Login & SignUp 
            </a>
            <?php        
                }
            ?>
        </li>
        <ul id='dropdown1' class='dropdown-content'>
                <li><a href="./order.php" class="center" style="text-decoration : none"><i class="material-icons">local_shipping</i>Orders</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="./account.php" class="center" style="text-decoration : none"><i class="material-icons">person</i>account</a></li>
                <?php 
                    if(isset($_SESSION['user'])){
                ?>
                <li class="divider" tabindex="-1"></li>
                <li><a href="./includes/endsession.php" class="center" style="text-decoration : none"><i class="material-icons">close</i>Log Out</a></li>
                <?php
                    }
                ?>
        </ul>

        <li class="col-sm-6 col-lg-6 col-md-6 navtext">
            <a class='dropdown-trigger nav-item text-white bg-dark pl-5 pr-3 center' style="text-decoration : none" href='#' data-target='dropdown2'>More<i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <ul id='dropdown2' class='dropdown-content'>
                <li><a href="./more.php" class="center" style="text-decoration : none"><i class="material-icons">room</i>Reach Us</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="./more.php" class="center" style="text-decoration : none"><i class="material-icons">call</i>Contact Us</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="./more.php" class="center" style="text-decoration : none"><i class="material-icons">email</i>Email</a></li>
         </ul>
         </ul>
         </div>
        <div class="col-1 col-sm-1 col-md-1 order-4" id="order-cart">
            <a class="text-white center row" style="text-decoration : none" href="./cart.php">
                <div class="col-sm-11"><i class="material-icons">shopping_cart</i></div>
                
                    <?php 
                        if(isset($_SESSION['no_of_items'])){if($_SESSION['no_of_items']!=0){?>
                            <div id="cart-number" class="col-sm-1" style="display :block" ><div id="crt-no"><?php echo $_SESSION['no_of_items'];?></div></div>
                        <?}else{
                            ?><div id="cart-number" class="col-sm-1" style="display :none" ><div id="crt-no"><?php echo $_SESSION['no_of_items'];?></div></div><?php
                        }}
                        else{
                            $_SESSION['no_of_items'] = 0;
                            ?><div id="cart-number" class="col-sm-1" style="display :none" ><div id="crt-no"><?php echo '0';?></div></div>
                            <?php $_SESSION['product'] = array(0 => '0');
                        } 
                    ?>
                                  
            </a>
        </div>
    
      
    </div>
  </nav>
 
        <ul id="mobile-demo" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background blue-grey darken-2">
                        
                    </div>
            <?php
                if(isset($_SESSION['user'])){
                        $id = $_SESSION['userid'];
                        $sq = "select * from users where id='$id' limit 1";
                        $re = mysqli_query($conn,$sq);
                        $row2 = mysqli_fetch_assoc($re);
                        if($row2['user_img_blob']==NULL){
            ?>
                <a href="./account.php"><img class="circle" src="./includes/images/Deafult-Profile-Pitcher.png"></a>
                        <?php }else{ ?><a href="./account.php"><img class="circle" src="data:image/jpeg;base64,<?php echo base64_encode( $row2['user_img_blob'])?>"></a>
                        <?php } ?>
                <a href="./account.php" style="font-size:18px;text-decoration:none;text-transform:uppercase"><span class="white-text name" ><?php echo $_SESSION['user']?></span></a>
                <a href="./account.php" style="font-size:18px;text-decoration:none"><span class="white-text email">
                    <?php
                        echo $row2['email'];
                        //$id = $_SESSION['userid'];
                        //$sq = "SELECT email FROM users WHERE id='$id' limit 1";
                        //$re = mysqli_query($conn,$sq);
                        //$val = mysqli_fetch_object($re);
                        //echo $val->email;
                    ?>
                </span></a>
            <?php        
                }
                else{
            ?>
                <a href="#user"><img class="circle" src="./includes/images/Album 2.png"></a>
                <a class="modal-trigger" href="#modal1" style="font-size:18px;text-decoration:none"><span class="white-text name" >Welcome Guest!<br /> Login/Sign Up</span></a>
                <a href="#email" style="font-size:18px;text-decoration:none"><span class="white-text email"></span></a>
            <?php        
                }
            ?>

                </div>
            </li>
            <li><a href="./home.php" style="font-size:18px;text-decoration:none"><i class ="material-icons">home</i>Home</a></li>
            <li><div class="divider"></div></li>
            <li><a href="./cart.php" style="font-size:18px;text-decoration:none"><i class ="material-icons">local_grocery_store</i>Cart</a></li>
            <li><div class="divider"></div></li>
            <?php 
                if(isset($_SESSION['user'])){
            ?>
                <li><a href="./order.php" style="font-size:18px;text-decoration:none"><i class="material-icons">local_shipping</i>Orders</a></li>
            <li><div class="divider"></div></li>
            <?php
                }else{
            ?>
                <li class="grey lighten-3 disable"><a style="font-size:18px;text-decoration:none;color:white"><i class="material-icons" style="color:white">local_shipping</i>Orders</a></li>
            <li><div class="divider"></div></li>
            <?php
                }
            ?>
            
            
            <?php 
                if(isset($_SESSION['user'])){
            ?>
                <li><a href="./account.php" style="font-size:18px;text-decoration:none"><i class ="material-icons">person</i>User Account</a></li>
            <li><div class="divider"></div></li>
            <?php
                }else{
            ?>
                <li class="grey lighten-3 disable"><a style="font-size:18px;text-decoration:none;color:white"><i class ="material-icons" style="color:white">person</i>User Account</a></li>
            <li><div class="divider"></div></li>
            <?php
                }
                if(isset($_SESSION['user'])){
            ?>
            <li><a href="./includes/endsession.php" style="font-size:18px;text-decoration:none"><i class ="material-icons">close</i>Log Out</a></li>
            <li><div class="divider"></div></li>
            <?php
                }
            ?>
            
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header" style="font-size:18px;text-decoration:none;padding-left:31px"><i class="material-icons">arrow_drop_down</i>Help Centre</a>
                        <div class="collapsible-body">
                            <ul class="grey lighten-2">
                                <li><a href="./more.php" class="center" style="font-size:18px;text-decoration:none"><i class="material-icons">room</i>Reach Us</a></li>
                                <li><a href="./more.php" class="center" style="font-size:18px;text-decoration:none"><i class="material-icons">call</i>Contact Us</a></li>
                                <li><a href="./more.php" class="center" style="font-size:18px;text-decoration:none"><i class="material-icons">email</i>Email</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>       
        </ul>
