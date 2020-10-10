<?php
    include "./includes/header.php";
?>
<div class="navbar-fixed">
<?php
    include "./includes/navbar.php";
?>
</div>
<!-- test message session -->
 

<?php
	if(isset($_SESSION['login-success']))
	{
	}
    unset($_SESSION['login-success']);
    ?>
<!-- Modal Trigger -->
<!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->

<?php
    include "./includes/modal.php";
    include "carousel.php";
    include "cards.php";
?>


<?php
    include "./includes/footer.php";
?>