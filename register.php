<?php
    require ('database/DBController.php');
    $db = new DBController();

    if(trim($_POST["username"]) != "" && trim($_POST["email"]) != "" && trim($_POST["password"]) != "" && trim($_POST["cf-password"]) != ""){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $cf_pwd = $_POST["cf-password"];
        $query = "SELECT * FROM user WHERE email='$email'";
        $res = $db->con->query($query);
        if($res->num_rows > 0){
            echo "<h2>Email đã được sử dụng</h2>";
        }
        else if($pwd != $cf_pwd){
            echo "<h2>Mật khẩu xác nhận không đúng</h2>";
        }
        else{
            $pwd = md5($pwd);
            $query = "INSERT INTO user (username,email,password) VALUES ('$username','$email','$pwd')";
            $db->con->query($query);
            echo "<h2>Đăng kí thành công!</h2>";
        }
    }
    // $db->close();
?>