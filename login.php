<?php
    $db = new mysqli("localhost","root","","electronic-ecommerce");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_COOKIE["token"])){
        header("location:user_page.php");
    }
    if(trim($_POST["email"]) != "" && trim($_POST["password"]) != ""){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query = "SELECT * FROM user_account WHERE email='$email'";
        $res = $db->query($query);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                if($row["password"] == md5($password)){
                    $email = $row["email"];
                    $id = $row["id"];
                    $username = $row["username"];
                    $token = md5($email.$id);
                    setcookie('token',$token,time()+30*60,'/');
                    $query = "SELECT * FROM user_token WHERE token='$token'";
                    $res = $db->query($query);
                    if($res->num_rows == 0){
                        $query = "INSERT INTO user_token (id,token) VALUES ('$id','$token')";
                        $db->query($query);
                    }
                    header("location:user_page.php");
                    $db->close();
                    die();
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