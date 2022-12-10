<?php
    $db = new mysqli("localhost","root","","electronic-ecommerce");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_COOKIE["token"])){
        $token = $_COOKIE["token"];
        $query = "SELECT * FROM user_token WHERE token='$token'";
        $id_user = $db->query($query)->fetch_assoc()["id"];
        $name = str_replace("%20"," ",$_GET["name"]);
        $query = "DELETE FROM user_cart WHERE name='$name' AND id_user=$id_user";
        $result = $db->query($query);
    }
    $db->close();
?>