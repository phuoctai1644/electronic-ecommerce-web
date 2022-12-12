<?php 
    require ('database/DBController.php');
    require ('database/Product.php');


    // $DBController Object
    $db = new DBController();
    
    // Product object
    $product = new Product($db);
    $product_shuffle = $product->getProduct();
?>