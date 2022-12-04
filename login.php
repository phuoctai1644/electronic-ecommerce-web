<?php
    $db = new mysqli("localhost","root","","electronic-ecommerce");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(trim($_POST["email"]) != "" && trim($_POST["password"]) != ""){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query = "SELECT * FROM user_account WHERE email='$email'";
        $res = $db->query($query);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                if($row["password"] == $password){
                    echo "<h2>Đăng nhập thành công!<h2>";
                    break;
                }
                else{
                    echo "<h2>Sai mật khẩu<h2>";
                    break;
                }
            }
        }
        else{
            echo "<h2>Bạn chưa tạo tài khoản</h2>";
        }
    }
    $db->close();
?>