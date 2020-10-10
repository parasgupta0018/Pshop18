
<?php 

    ob_start();
    session_start();
    include "dbs.php";

    session_unset();
    header("location: ../home.php")

?>