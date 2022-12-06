<body>
    <?php
        $db = new mysqli("localhost","root","","user_db");
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        if(!isset($_COOKIE['token'])){
            header("location:index.html");
            die();
        }
        $token = $_COOKIE['token'];
        if(empty($token)){
            die();
        }
        echo "<h1>Dang nhap thanh cong</h1>";
        echo "<h1>Chao mung</h1>";
        $query = "SELECT user_data.* FROM user_data,user_token WHERE token='$token' AND user_data.id=user_token.id";
        $res = $db->query($query);
        echo "<h1>".$res->fetch_assoc()['username']."</h1>";
    ?>
    <button onclick="log_out()">Dang xuat</button>
    <script src="index.js"></script>
</body>