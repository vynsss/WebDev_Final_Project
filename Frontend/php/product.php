<?php
    if($_REQUEST["product_id"]){
        $_SESSION["product_id"] = $_REQUEST["product_id"];

        header('Location: ../home.php');
    }
?>