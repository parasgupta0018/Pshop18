
<?php 
    include "./includes/header.php";
    include "./includes/modal.php";

?>
<div class="navbar-fixed">
<?php
    include "./includes/navbar.php";
?>
</div>
<div class="row m-0 ml-5">
    <div class="col-12 col-sm-4">
        <h4>ADDRESS:</h4>
        <p>B-104/2, Derawal Nagar<br>
        Near Model Town Metro Station<br>
        Delhi - 110009</p>
    </div>
    <div class="col-12 col-sm-4">
        <h4>CONTACT US :</h4>
        <p> service center: 9971611373<br>
            consumer support: 9871155403<br>
            legal issues: 9971164773<br>
        </p>  
    </div>
    <div class="col-12 col-sm-4">
        <h4>EMAIL US:</h4>
        <p><a style="text-decoration:none" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=parasgupta34@gmail.com">parasgupta34@gmail.com</a><br>
           <a style="text-decoration:none" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=pshop18@support.com">pshop18@support.com</a><br>
           <a style="text-decoration:none" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=pg12@noreply.in">pg18@noreply.in</a> 
        </p>
    </div>
</div>
<div id="maps">
    <h3 style="padding-left: 3vw">Reach us at: </h3>
    <div id="map_display" style="width : 90%; height : 400px; margin:40px"></div>
</div>
<?php include "./includes/footer.php";?>  

<script type="text/javascript">
    var x = document.getElementById('maps');

function getLocation(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition ,  showError);
    }
    else{
        x.innerHTML = "Browser doesn't support maps!";
    }
}
function showError(error){
    if(error.PERMISSION_DENIED){
        alert ("location permission denied ");
    }    
}
function showPosition(position){
    //var loc  = {lat: position.coords.latitude, lng: position.coords.longitude};
    var loc = {lat:28.702152,lng: 77.191467};
    var map = new google.maps.Map(document.getElementById('map_display'), {zoom: 16, center: loc });
    var marker = new google.maps.Marker({position: loc , map: map});
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=getLocation"
type="text/javascript"></script>
