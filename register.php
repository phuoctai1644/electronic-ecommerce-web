<?php
    $db = new mysqli("localhost","root","","user_db");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(trim($_POST["username"]) != "" && trim($_POST["email"]) != "" && trim($_POST["pwd"]) != "" && trim($_POST["cf-pwd"]) != ""){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $cf_pwd = $_POST["cf-pwd"];
        $query = "SELECT * FROM user_data WHERE email='$email'";
        $res = $db->query($query);
        if($res->num_rows > 0){
            echo "<h2>Email đã được sử dụng</h2>";
        }
        else if($pwd != $cf_pwd){
            echo "<h2>Mật khẩu xác nhận không đúng</h2>";
        }
        else{
            $pwd = md5($pwd);
            $query = "INSERT INTO user_data (username,email,password) VALUES ('$username','$email','$pwd')";
            $db->query($query);
            echo "<h2>Đăng kí thành công!</h2>";
        }
    }
    $db->close();
?>