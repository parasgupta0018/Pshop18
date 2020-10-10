<?php
    ob_start();
    session_start();
    include "dbs.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PShop18</title>
        <link rel="icon" type="image" href="./includes/images/plogod614-41c9-a8ed-99372c8c45fa.ico">
        <meta name="description" content="This is the description">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="./css/materialize.css"/>
        <link rel="stylesheet" href="./css/storestyle.css" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
       
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--croppie-->
        <link rel="stylesheet" href="./css/croppie.css" />
        

        <!-- jQuery library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./js/jquery.js"></script>
        <script src="./js/croppie.js"></script>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
            
        <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <!--slider-->
   <link rel="stylesheet" href="./css/slider.css">
   <script src="./js/slider.js"></script>
   <!--sweetalert-->
   <script src="./css/Sweet Alert/sweetalert.min.js"></script>
   <script src="https://use.fontawesome.com/e64e60012.js"></script>

<script src="./js/materialize.js"></script>
<script type="text/JavaScript">
    
    $(document).ready(function(){
        $('.tabs').tabs();
    });
    $(document).ready(function(){
     $('.modal').modal();
    });
    function open_modal(){

        $(document).ready(function(){
            $(".modal").modal("open");
        });
        $(document).ready(function(){
            $(".tabs").tabs("select","login");
        });
    }

    function open_modal_signup(){
        $(document).ready(function(){
            $(".modal").modal("open");
        });
    }
    $(document).ready(function(){
        $('#search').keyup(function(){
            var searchText = $(this).val();
            if(searchText != '')
            {
                $.ajax({
                    url: 'search.php',
                    method: 'post',
                    data:{query:searchText},
                    success: function(response)
                    {
                        $('#search_bar').html(response);
                    }
                });
            }
            else
            {
                $('#search_bar').html('');
            }
        });
        $('#search_bar').on('click','a',function(){
            $('#search').val($(this).text());
            $('#search').focus();
            $('#search_bar').html('');
        });

        $(document).mouseup(function(e) 
        {
            var container = $("#search_bar");
            var container_search = $("#search");
            if (!container.is(e.target) && !container_search.is(e.target) && container.has(e.target).length === 0) 
            {
                container.hide();
            }
            if(container_search.is(e.target)){
                container.show();
            }
        });
    
    });

</script>
    </head>
    <body>