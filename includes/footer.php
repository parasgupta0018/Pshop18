<div class="container-fluid row p-3 pl-5 bg-dark d-flex">
                <div class=" col-6 col-sm-4">
                    <img src="./includes/images/download.png" class="footimg"/>
                    <p class="text-white">Copyright © 2019 Paras18 Inc.</p>
                    <i href="#" class="fa fa-facebook mr-2 mt-2"></i>
                    <i href="#" class="fa fa-twitter mr-2 mt-2"></i>
                    <i href="#" class="fa fa-linkedin mr-2 mt-2"></i>
                    <i href="#" class="fa fa-youtube mr-2 mt-2"></i>
                    <i href="#" class="fa fa-instagram mr-2 mt-2"></i>
                </div>
                <div class="col-6 col-sm-8 row">    
                    <div class="col-12 col-sm-6 row">
                        <div class="p-3 col-12 col-sm-12 col-md-6">
                            
                            <ul class="footlist">
                            <h6 class="text-light">ABOUT</h6>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    contact us 
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    reach us
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    help center
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-3 col-12 col-sm-12 col-md-6">
                            
                            <ul class="footlist">
                            <h6 class="text-light">HELP</h6>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    payment   
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    cancellation
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    infringement
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    FAQ
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 row">
                        <div class="p-3 col-12 col-sm-12 col-md-6">
                        
                            <ul class="footlist">
                            <h6 class="text-light">POLICY</h6>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    return policy
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    seurity
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    privacy
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-3 col-12 col-sm-12 col-md-6">
                            
                            <ul class="footlist">
                            <h6 class="text-light">MORE</h6>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    mail
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    acknowledge
                                    </a>
                                </li>
                                <li class="footerItem">
                                    <a href="" class="footItem">
                                    complaince
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>    
            
<script src="./js/storejs1.js"></script>
<script src="./js/storejs.js"></script>
<script type="text/javascript">

    //var log = document.getElementsByClassName('login-panel');
    //var sign = document.getElementsByClassName('signup-panel');

    var maxHeight = 0;
        $("panel").each(function(){
            if ($(this).height() > maxHeight) 
            { 
                maxHeight = $(this).height();
            }
        });
        console.log(maxHeight);
        $("panel").height(maxHeight);
    
    $(window).resize(function(){        
        $("panel").each(function(){
            if ($(this).height() > maxHeight) 
            { 
                maxHeight = $(this).height();
            }
        });
        console.log(maxHeight);
        $("panel").height(maxHeight);
    });    

    $(document).ready(function(){
        $('.tabs').tabs();
    });
    $(document).ready(function(){
     $('.modal').modal();
    });
    $(document).ready(function(){
    $('.sidenav').sidenav();
    });
    $(document).ready(function()
    {
        $('.dropdown-trigger').dropdown({
            coverTrigger : false
        });
    });
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });

    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });

    setInterval(function(){
        $('.carousel.carousel-slider').carousel('next');
    },5000);

  function ToggleLoginPassword(ev) 
    {    var y = ev.target;
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
            y.style.color = "rgba(0, 150, 136, 0.7)";
        } 
        else {
            x.type = "password";
            y.style.color = "black";
        }
    }
    function ToggleSignupPassword(ev) 
    {    var y = ev.target;
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            y.style.color = "rgba(0, 150, 136, 0.7)";
        } 
        else {
            x.type = "password";
            y.style.color = "black";
        }
    }

    var error = "<?php if(isset($_SESSION['login-error'])){echo 'true';} else {echo 'false';}?>";
    $(document).ready(function(){
        if(error=='true') {
           open_modal(); 
           <?php unset($_SESSION['login-error']);?> 
        } 
    });    
    var verify = "<?php if(isset($_SESSION['success'])){echo 'true';} else {echo 'false';}?>";
    var verified = "<?php if(isset($_SESSION['verified'])){echo 'true';} else {echo 'false';}?>";
    $(document).ready(function(){
        if(verify=='true' || verified=='true') {
           open_modal();  
        } 
    });

    var error_signup = "<?php if(isset($_SESSION['error'])){echo 'true';} else {echo 'false';} ?>";
    $(document).ready(function(){
        if(error_signup == 'true'){
            open_modal_signup();
            <?php unset($_SESSION['error']);?>
        }
    });

    
</script>

</body>
</html>

