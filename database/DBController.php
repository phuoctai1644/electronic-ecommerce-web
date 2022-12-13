<?php 
    class DBController {
        // Database Connection Properties
        // protected $host = '34.124.177.159:6805';
        // protected $user = 'root';
        // protected $password = 'newpassword';
        // protected $database = "ltw";

        protected $host = 'localhost';
        protected $user = 'root';
        protected $password = '';
        protected $database = "electronic-ecommerce";
        

        // connection property
        public $con = null;

        // Constructor
        public function __construct() {
            $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            if ($this->con->connect_error){
                echo "Fail " . $this->con->connect_error;
            }
        }

        // Destructor
        public function __destruct() {
            $this->closeConnection();
        }

        // for mysqli closing connection
        protected function closeConnection(){
            if ($this->con != null ){
                $this->con->close();
                $this->con = null;
            }
        }
    }
?>