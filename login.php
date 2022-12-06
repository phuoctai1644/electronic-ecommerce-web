<?php
    $db = new mysqli("localhost","root","","user_db");
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    if(trim($_POST["email"]) != "" && trim($_POST["pwd"]) != ""){
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $query = "SELECT * FROM user_data WHERE email='$email'";
        $res = $db->query($query);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                if($row["password"] == md5($pwd)){
                    $email = $row["email"];
                    $id = $row["id"];
                    $token = md5($email.time().$id);
                    setcookie('token',$token,time()+30*60,'/');
                    $query = "INSERT INTO user_token (id,token) VALUES ('$id','$token')";
                    $db->query($query);
                    $db->close();
                    header("location:user.php");
                    die();
                }
                else{
                    echo "<h2>Sai mật khẩu<h2>";
                    break;
                }
            }
        }
        else{
            echo "<h2>Tài khoản này không tồn tại</h2>";
        }
    }
    $db->close();
?>