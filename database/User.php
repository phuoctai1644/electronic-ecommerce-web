<?php 
    class User {
        public $db = null;

        public function __construct(DBController $db) {
            if (!isset($db->con)) return null;
            $this->db = $db;
        }

        public function login() {
            // if(trim($_POST["email"]) != '' && trim($_POST["password"]) != '') {
            //     $email = $_POST["email"];
            //     $password = $_POST["password"];
            //     $query = "SELECT * FROM user WHERE email='$email'";

            //     $res = $this->db->con->query($query);
            //     if($res->num_rows > 0) {
            //         while($row = $res->fetch_assoc()){
            //             if($row["password"] == md5($password)){
            //                 $email = $row["email"];
            //                 $id = $row["id"];
            //                 $token = md5($email.$id);
            //                 setcookie('token',$token,time()+30*60,'/');
            //                 $query = "SELECT * FROM user_token WHERE token='$token'";
            //                 $res = $this->db->con->query($query);
            //                 if($res->num_rows == 0){
            //                     $query = "INSERT INTO user_token (id,token) VALUES ('$id','$token')";
            //                     $this->db->con->query($query);
            //                 }
            //                 header("location:user_page.php");
            //                 die();
            //             }
            //             else{
            //                 echo "<h2>Sai mật khẩu<h2>";
            //                 break;
            //             }
            //         }
            //     } else {
            //         echo "<h2>Bạn chưa tạo tài khoản</h2>";
            //     }
            // } 

            echo 1;
        }

        public function register() {
            if(trim($_POST["username"]) != "" && trim($_POST["email"]) != "" && trim($_POST["pwd"]) != "" && trim($_POST["cf-pwd"]) != ""){
                $username = $_POST["username"];
                $email = $_POST["email"];
                $pwd = $_POST["pwd"];
                $cf_pwd = $_POST["cf-pwd"];
                $query = "SELECT * FROM user_data WHERE email='$email'";
                $res = $this->db->con->query($query);
                if($res->num_rows > 0){
                    echo "<h2>Email đã được sử dụng</h2>";
                }
                else if($pwd != $cf_pwd){
                    echo "<h2>Mật khẩu xác nhận không đúng</h2>";
                }
                else{
                    $pwd = md5($pwd);
                    $query = "INSERT INTO user (username,email,password) VALUES ('$username','$email','$pwd')";
                    $this->db->con->query($query);
                    echo "<h2>Đăng kí thành công!</h2>";
                }
            }
        }
    }       
?>