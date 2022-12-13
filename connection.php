<?php 
    require ('database/DBController.php');
    require ('database/Product.php');
    require ('database/User.php');


    // $DBController Object
    $db = new DBController();
    
    // Product object
    $product = new Product($db);
    $product_shuffle = $product->getProduct();

    $user = new User($db);
?>