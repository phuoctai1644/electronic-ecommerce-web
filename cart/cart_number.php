<?php
    $db = new mysqli("localhost","root","","electronic-ecommerce");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_COOKIE["token"])){
        $token = $_COOKIE["token"];
        $query = "SELECT * FROM user_token WHERE token='$token'";
        $id_user = $db->query($query)->fetch_assoc()["id"];
        $query = "SELECT * FROM user_cart WHERE id_user=$id_user";
        $result = $db->query($query);
        $total = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $total += $row["num"];
            }
        }
        echo $total;
    }
    $db->close();
?>