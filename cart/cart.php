<?php
    function product_price($priceFloat) {
        $symbol = 'đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price.$symbol;
    }
    $db = new mysqli("localhost","root","","electronic-ecommerce");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_COOKIE["token"])){
        $token = $_COOKIE["token"];
        $query = "SELECT * FROM user_token WHERE token='$token'";
        $id_user = $db->query($query)->fetch_assoc()["id"];
    }
    else die();
    $query = "SELECT * FROM user_cart WHERE id_user=$id_user";
    $result = $db->query($query);
    $i = 0;
    $total = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $name = str_replace(" ","-",$row["name"]);
            $money = product_price($row["num"]*$row["money"]);
            echo "<div class='products'>
                    <div style='display:grid;grid-template-columns:50% 50%;align-items:center;height:100%;'>
                        <div><img src=".$row["image"]."></div>
                        <div>
                            <b><span id='".$name."'>".$row["name"]."</span></b><br>
                            <span style='color:green'>$money<span>
                        </div>
                    </div>
                    <div class='button-cart'>
                        <button class='btn btn-light' id='btnX' onclick=","delete_from_cart('".$name."')",">X</button>
                        <div>
                            <button class='btn primary-color-bg' onclick=","decrease_product(","'p".$i."','".$name."')>-</button>
                            <span id=","'p".$i."'>".$row["num"]."</span>
                            <button class='btn primary-color-bg' onclick=","increase_product(","'p".$i."','".$name."')>+</button>
                        </div>
                    </div>
                </div>";
            $i++;
        }
    }
    $db->close();
?>