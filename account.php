
<?php 
    include "./includes/header.php";
    include "./includes/modal.php";

?>
<div class="navbar-fixed">
<?php
    include "./includes/navbar.php";
    $id = $_SESSION['userid'];
    $sqla = "select * from users where id = '$id'";
    $resa = mysqli_query($conn,$sqla);
    $rowa = mysqli_fetch_assoc($resa);

    /*if(isset($_FILES['user-image'])){
        $destination_path = getcwd().DIRECTORY_SEPARATOR;
        $target = $destination_path.'includes/images/'.basename($_FILES['user-image']['name']);
        $image = $_FILES['user-image']['name'];
        if($rowa['user_image']!=NULL){$curr_img = $rowa['user_image'];}
        $sqli = "UPDATE users SET user_image='$image' WHERE id='$id'";
        mysqli_query($conn,$sqli);

        if(move_uploaded_file($_FILES['user-image']['tmp_name'], $target)){
            $msg = "image uplaoded succesfully";
            if(isset($curr_img)){unlink($destination_path.'includes/images/'.$curr_img);}
            header("location:account.php");
        }
        else{
            $msg = "problem uploading image";
        }
        
    }   */
    if(isset($_POST["image"]))
                {
                    $data = $_POST["image"];
                    $image_array_1 = explode(";", $data);
                    $image_array_2 = explode(",", $image_array_1[1]);
                    $data = base64_decode($image_array_2[1]);
                    $imageName = time() . '.png';
                    file_put_contents($imageName, $data);
                    $image_file = addslashes(file_get_contents($imageName));
                    if($rowa['user_img_blob']!=NULL){$rowa['user_img_blob']=NULL;}
                    $query = "UPDATE users SET user_img_blob='$image_file' WHERE id='$id'";
                    $statement = mysqli_query($conn,$query);
                    header("Refresh:0");
                    if($statement)
                    {
                        echo 'Image save into database';
                        unlink($imageName);
                        header("Refresh:0");
                    }
                }

?>
</div>
<div class="jumbotron m-0 mt-1 bg-light row">
        <div class="card col-sm-4 mt-0">
            <div class="card-image">
                <!--<img src="./includes/images/Deafult-Profile-Pitcher.png">
                <button type="" class="btn-floating halfway-fab waves-effect waves-light blue" id="img_update">
                    <i class="material-icons">edit</i>
                </button>-->
                <?php 
                    if($rowa['user_img_blob']==NULL){
                ?>      <img src="./includes/images/Deafult-Profile-Pitcher.png">
                <?php  }else{ ?>
                        <!--<img src="./includes/images/ >-->
                <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowa['user_img_blob'])?>" style="border-radius:50%;padding:15px;object-fit:contain"/>
                <?php }?>
                <form method="post" action="account.php" enctype="multipart/form-data">
                    <!--<input type="file" name="user-image" onchange="this.form.submit()" value />
                    <button type="submit" name="upload" class="btn-floating halfway-fab waves-effect waves-light blue" id="img_update">
                        <i class="material-icons">edit</i>
                    </button>-->
                    <input type="file" name="user-image" id="img-upload" style="display:none"/>
                    <label for="img-upload" class="custom-file-upload">
                        <i class="material-icons btn-floating halfway-fab waves-effect waves-light blue" id="upload-icon">edit</i>
                    </label>
                </form>
            </div>
            <div id="uploadimageModal" class="modal" role="dialog">
                
                    <div class="modal-content d-flex flex-column p-0" id="modal_cont" style="height:100%;">
                            <div class="modal-header p-0 m-0">
                                <button id="btnclose" class="modal-close col-2 col-sm-2" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body center">
                                <div class="row">
                                    <div class="col-12 col-sm-12 text-center">
                                        <div id="image_demo" style="width:30vw; margin-top:5px"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
            </div>
            <div class="card-content pt-5 text-center">
                <p style="text-transform:uppercase"><? echo $_SESSION['user']?></p>
                <p><? echo $rowa['email']?></p>
            </div>
        </div>
            <div id="pwd" class="card-panel col-sm-8" style="margin-top:0px;display:none">                       
                <form class="form" method="post" action="update.php">
                 
                 <div class="row mb-4">
                     <h3 class="col-sm-9">UPDATE PASSWORD</h3>
                 </div>

                 <div class="row">
                                <div class="input-field col-11">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="cpassword" type="password" name="cpassword" class="validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="cpassword">Current Password</label>
                                </div>
                                <div class="col-1">
                                    <i class="material-icons prefix" id="hide_pwc" style="margin-top:20px;color:black; cursor:pointer; font-size:24px"  onclick="TogglecShowPassword(event)">remove_red_eye</i>
                                </div>
                            
                </div>
                <div class="row">
                                <div class="input-field col-11">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="npassword" type="password" name="npassword" class="validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                                    <label for="npassword">New Password</label>
                                </div>
                                <div class="col-1">
                                    <i class="material-icons prefix" id="hide_pwn" style="margin-top:20px;color:black; cursor:pointer; font-size:24px"  onclick="TogglenShowPassword(event)">remove_red_eye</i>
                                </div>
                            
                </div>

                 <div class="center row"> 
                    <button class="btn btn-danger col-sm-3 mt-5" id="cancel">CANCEL</button>
                    <input type="submit" name ="updt_pwd" value="UPDATE PASSWORD" class="col-sm-8 btn mt-5 btn-success container" id="signupbtn"/>
                 </div>
                </form>
            </div>
            <div id="info" class="card-panel col-sm-8" style="margin-top:0px">                       
                <form class="form" method="post" action="update.php">
                 
                 <div class="row mb-4">
                     <h3 class="col-sm-11"><b>PROFILE INFORMATION</b></h3>
                     <div class="col-sm-1 text-right">
                         <a class="btn-floating waves-effect waves-light blue" id="info_update">
                             <i class="material-icons">edit</i>
                         </a>
                     </div>
                 </div>

                 <div class="row mt-4">
                     <div class="input-field col-12 col-sm-6">
                     <i class="material-icons prefix">account_circle</i>
                         <input id="first_name" name="firstname" disabled value="<? echo $rowa['username_first']?>" type="text" class="updatef validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                         <label for="first_name">First Name</label>
                     </div>
                     <div class="input-field col-12 col-sm-6">
                     <i class="material-icons prefix">account_circle</i>
                         <input id="last_name" name="lastname" disabled value="<? echo $rowa['username_last']?>" type="text" class="updatef validate" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                         <label for="last_name">Last Name</label>
                     </div>
                 </div>
                 <div class="row mt-4">
                     <div class="input-field col-sm-12">
                         <i class="material-icons prefix">email</i>
                         <input id="emailId" disabled value="<? echo $rowa['email']?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required type="email" name="email" class="validate updatef" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                         <label for="emailId">Email</label>
                     </div>
                 </div>
                 <div class="row mt-4">
                     <div class="input-field col-sm-12">
                     <i class="material-icons prefix">phone</i>
                         <input id="phone" type="number" disabled value="<? echo $rowa['mobile']?>" name="phone" maxlength="10" class="validate updatef" max="9999999999" min="1000000000" oninvalid="this.setCustomValidity('Phone number must be 10 digits long!')" oninput="this.setCustomValidity('')" required oninvalid="this.setCustomValidity('This field is required to Sign Up')" oninput="this.setCustomValidity('')">
                         <label for="phone">Phone Number</label>
                     </div>
                 </div>
                 <div class="mt-4 ml-5" style="color: blue">
                     <a id="change_pwd" style="cursor:pointer">Change Password</a>
                 </div>
                 <div class="center"> 
                     <input type="submit" name ="updt_info" disabled value="UPDATE" class="btn mt-5 btn-success container updatef" id="signupbtn"/>
                 </div>
                </form>
            </div>
</div>
<script type="text/javascript">
    $('#info_update').click(function(){
        var updt = document.getElementsByClassName('updatef');
        for(var i=0; i<updt.length;i++){
            updt[i].disabled = false;
        }
    });
    $(document).ready(function(){
        $('#change_pwd').click(function(){
            $('#info').hide();
            $('#pwd').show();
        });
    });
    $(document).ready(function(){
        $('#cancel').click(function(){
            $('#pwd').hide();
            $('#info').show();
        });
    });
    function TogglecShowPassword(ev) 
    {    var y = ev.target;
        var x = document.getElementById("cpassword");
        if (x.type === "password") {
            x.type = "text";
            y.style.color = "rgba(0, 150, 136, 0.7)";
        } 
        else {
            x.type = "password";
            y.style.color = "black";
        }
    }
    function TogglenShowPassword(ev) 
    {    var y = ev.target;
        var x = document.getElementById("npassword");
        if (x.type === "password") {
            x.type = "text";
            y.style.color = "rgba(0, 150, 136, 0.7)";
        } 
        else {
            x.type = "password";
            y.style.color = "black";
        }
    }
    $(document).ready(function(){

$image_crop = $('#image_demo').croppie({
   enableExif: true,
   viewport: {
     width:220,
     height:220,
     type:'circle' 
   },
   boundary:{
     width:400,
     height:400
   }
 });

 $('#img-upload').on('change', function(){
   var reader = new FileReader();
   reader.onload = function (event) {
     $image_crop.croppie('bind', {
       url: event.target.result
     }).then(function(){
       console.log('jQuery bind complete');
     });
   }
   reader.readAsDataURL(this.files[0]);
   $('#uploadimageModal').modal('open');
   cropping();
 });

 $('.crop_image').click(function(event){
   $image_crop.croppie('result', {
     type: 'canvas',
     size: 'viewport'
   }).then(function(response){
     $.ajax({
       url:"account.php",
       type: "POST",
       data:{image: response},
       success:function(data)
       {
         $('#uploadimageModal').modal('close');
         console.log(data);
         location.reload();
         //$('#uploaded_image').html(data);
       }
     });
   })
 });

});  

    function cropping(){
        var maxHeight = 0;
       if(($('#uploadimageModal').height())>($('#modal_cont').height())){
           maxHeight = $('#uploadimageModal').height();
       }
       else{
           maxHeight = $('#modal_cont').height();
       }
       $('#uploadimageModal').height(maxHeight + 20);
       $('#modal_cont').height(maxHeight + 20);
       var maxWidth = 0;
        maxWidth = $('#uploadimageModal').width();
        maxWidth = (0.93 * maxWidth);
        boundHeight = (0.7 * $('#uploadimageModal').height());
       $('#bound').width(maxWidth); $('#cropimg').width(maxWidth);
       $('#slider').width(maxWidth);
       $('#bound').height(boundHeight);$('#cropimg').height(maxHeight);
    }   
    
    $(window).resize(function(){        
        if(($('#uploadimageModal').height())>($('#modal_cont').height())){
           maxHeight = $('#uploadimageModal').height();
       }
       else{
           maxHeight = $('#modal_cont').height();
       }
       //maxHeight = 1.1 * maxHeight;
       $('#uploadimageModal').height(maxHeight);
       $('#modal_cont').height(maxHeight);
     
            
        maxWidth = $('#uploadimageModal').width();
        maxWidth = (0.93 * maxWidth);
        boundHeight = (0.7 * $('#uploadimageModal').height());
       $('#bound').width(maxWidth);
       $('#slider').width(maxWidth);
       $('#bound').height(boundHeight);
       //console.log(maxWidth,'w');
    }); 
</script>
<?php include "./includes/footer.php"; ?>  