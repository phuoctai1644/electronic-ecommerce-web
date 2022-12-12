<?php
    $db = new mysqli("localhost","root","","electronic-ecommerce");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(trim($_POST["username"]) != "" && trim($_POST["email"]) != "" && trim($_POST["password"]) != "" && trim($_POST["cf-password"]) != ""){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cf_password = $_POST["cf-password"];
        
        $query = "SELECT * FROM user_account WHERE email='$email'";
        $res = $db->query($query);
        if($res->num_rows > 0){
            echo "<h2>Email đã được sử dụng</h2>";
        }
        else if($password != $cf_password){
            echo "<h2>Mật khẩu xác nhận không đúng</h2>";
        }
        else{
            $query = "INSERT INTO user_account (username,email,password) VALUES ('$username','$email','$password')";
            $db->query($query);
            echo "<h2>Đăng kí thành công!</h2>";
        }
    }
    $db->close();
?>