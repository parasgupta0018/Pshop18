<?php
    include './includes/dbs.php';
    if(isset($_POST['query'])){
        $searchText = $_POST['query'];
        //$sqli = "SELECT category FROM categories WHERE category LIKE '%$searchText%'";
        $sqli = "SELECT category
                 FROM categories
                 WHERE category LIKE '%$searchText%'
                 ORDER BY CASE
                     WHEN category LIKE '$searchText%' THEN 1
                     WHEN category LIKE '%$searchText' THEN 3
                     ELSE 2
                 END;";
        $resi = mysqli_query($conn,$sqli);
        if(mysqli_num_rows($resi)>0)
        {   while($rowi = mysqli_fetch_assoc($resi))
            {
                echo '<a class="list-group-item" role="option">'.$rowi['category'].'</a>';
            }
        }
        else {
           echo '';
        }
    }
    if(isset($_POST['search'])){
        echo $_POST['search'];
    }

?>