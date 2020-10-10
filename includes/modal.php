
<!-- Modal Structure -->
<div id="modal1" class="modal" style="max-height:80%;">

  <div class="modal-content ratio" style="padding-bottom: 28px; height:100%">
    <div class="container-fluid ratio-content">
        <a class="modal-close" style="text-decoration:none"><i class="material-icons float-right" style="margin: -17px -15px 0px 0px">close</i></a>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 hide-small">
                <div class="card bg-dark side-panel">
                    <div class="card-image" style="margin-bottom:100px; padding:100px 10px 0px 5px">
                        <img src="includes/images/download.png" alt="">
                    </div>
                    
                    <div class="card-content white-text">
                        <span class="card-title">LOGIN / SIGNUP</span>
                        <p>Get access to your Orders, Wishlist and Recommendations</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card-panel center" style="margin-bottom:0px">
                    <ul class="tabs">
                        <li class="tab" id ="login-tab" style="width:46%"><a href="#login" class="teal-text" style="text-decoration:none">LOGIN</a></li>
                        <li class="tab active" id ="signup-tab" style="width:46%"><a href="#signup" class="active teal-text" style="text-decoration:none">SIGNUP</a></li>
                    </ul>
                </div>
                <div id="login" class="card-panel center login-panel panel" style="margin-top:0px">
                    
                        <form class="form" method="post" action="login.php">
                            
                            
                                <?php
                                    if(isset($_SESSION['login-error']))
                                    {
                                ?>
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <p><?php echo $_SESSION['login-error']; echo '<script>console.log("executed3");</script>'?></p>
                                </div>
                                <?php
                                    }
                                //unset($_SESSION['login-error']);
                                elseif(isset($_SESSION['success']) && isset($_SESSION['verified']))
                                    {
                                ?>
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <p>your account is now verified login to continue</p>
                                </div>
                                <?php
                                    }
                                    elseif(isset($_SESSION['success']) && !isset($_SESSION['verified'])){
                                ?>
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <p><?php echo $_SESSION['success'];?></p>
                                </div>
                                <?
                                    }
                                    else{
                                ?>
                                        <div class="alert"></div>
                                <?php }?>
                    

                            <div class="row">
                                <div class="input-field col-sm-12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" class="validate" required oninvalid="this.setCustomValidity('This field is required to Log In')" oninput="this.setCustomValidity('')">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-sm-12">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phoneno" type="number" maxlength="10" class="validate" name="phone" max="9999999999" min="1000000000" oninvalid="this.setCustomValidity('Phone number must be 10 digits long!')" oninput="this.setCustomValidity('')" required oninvalid="this.setCustomValidity('This field is required to Log In')" oninput="this.setCustomValidity('')">
                                    <label for="phoneno">Phone Number</label>
                                </div>
                            </div>
                            <?php if(isset($_SESSION['login-error'])){ ?>
                                <div class="row" id="padd" style="padding-bottom : 12.5vh">
                                    <div class="input-field col-11">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="pass" type="password" class="validate" name="password" required oninvalid="this.setCustomValidity('This field is required to Log In')" oninput="this.setCustomValidity('')">
                                        <label for="pass">Password</label>
                                    </div>
                                    <div class="col-1">
                                        <i class="material-icons prefix" id="hide_pw" style="margin-top:20px;color:black; cursor:pointer; font-size:24px; "  onclick="ToggleLoginPassword(event)">remove_red_eye</i>
                                        
                                    </div>   
                                </div>
                            <?php
                            }
                            else{
                            ?>    
                                <div class="row" id="padd" style="padding-bottom : 16.5vh">
                                    <div class="input-field col-11">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="pass" type="password" class="validate" name="password" required oninvalid="this.setCustomValidity('This field is required to Log In')" oninput="this.setCustomValidity('')">
                                        <label for="pass">Password</label>
                                    </div>
                                    <div class="col-1">
                                        <i class="material-icons prefix" id="hide_pw" style="margin-top:20px;color:black; cursor:pointer; font-size:24px; "  onclick="ToggleLoginPassword(event)">remove_red_eye</i>
                                    </div>   
                                </div>
                            <?php
                                }
                            ?>
                            <input type="submit" name="login" value="LOGIN" class="btn btn-success container center" id="loginbtn"/>
                        </form>
                </div>
                    
                <div id="signup" class="card-panel center signup-panel panel" style="margin-top:0px">
                                    
                        <form class="form" method="post" action="signup.php">
                            
                            <?php
                                    if(isset($_SESSION['error']))
                                    {
                                ?>
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <p><?php echo $_SESSION['error'];?></p>
                                </div>
                                <?php
                                    }
                                    else{
                                ?>
                                <div class="alert"></div>
                                <?php
                                    }
                                //unset($_SESSION['login-error']);
                                ?>    
                            

                            <div class="row">
                                <div class="input-field col-12 col-sm-6">
                                <i class="material-icons prefix">account_circle</i>
                                    <input id="first_name" name="firstname" type="text" class="validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col-12 col-sm-6">
                                <i class="material-icons prefix">account_circle</i>
                                    <input id="last_name" name="lastname" type="text" class="validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                        

                            <div class="row">
                                <div class="input-field col-sm-12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="emailId" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required type="email" name="email" class="validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="emailId">Email</label>
                                </div><!-- .!#$%&amp;'*+/=?^_`{|}~- -->
                            </div>
                            <div class="row">
                                <div class="input-field col-sm-12">
                                <i class="material-icons prefix">phone</i>
                                    <input id="phone" type="number" name="phone" maxlength="10" class="validate" max="9999999999" min="1000000000" oninvalid="this.setCustomValidity('Phone number must be 10 digits long!')" oninput="this.setCustomValidity('')" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-11">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" type="password" name="password" class="validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-1">
                                    <i class="material-icons prefix" id="hide_pw" style="margin-top:20px;color:black; cursor:pointer; font-size:24px"  onclick="ToggleSignupPassword(event)">remove_red_eye</i>
                                </div>
                            
                            </div>
                            <?php if(isset($_SESSION['error'])){ ?>
                            <div class="form-group text-center" style="margin-top:8px; margin-left:0px ">
                                <label class="label1">
                                    <input type="checkbox" class="filled-in" required>
                                    <span>I accept the <span class="text-success">Terms of use</span> and Privacy Policy.</span>
                                </label>
                            </div>
                            <?php } else{?>
                            <div class="form-group text-center" style="margin-top:20px; margin-left:10px ">
                                <label class="label1">
                                    <input type="checkbox" class="filled-in" required>
                                    <span>I accept the <span class="text-success">Terms of use</span> and Privacy Policy.</span>
                                </label>
                            </div>
                            <?php } ?>    
                            <input type="submit" name ="signup" value="SIGNUP" class="btn btn-success container" id="signupbtn"/>
                        
                        </form>
                </div>
                
            </div>
        </div>
    </div>

  </div>
  
</div>