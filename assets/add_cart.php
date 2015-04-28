<?php
    session_start();
    $count = count($_SESSION['cart']);
    echo $count."<br>";
    
        echo $_SESSION['cart'][1];
    
?>