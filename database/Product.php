<?php 
    class Product {
        public $db = null;

        public function __construct(DBController $db) {
            if (!isset($db->con)) return null;
            $this->db = $db;
        }

        // fetch product data using getData Method
        public function getProduct($table = 'product') {
            $result = $this->db->con->query("SELECT * FROM {$table}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }

        public function getProductById($item_id = null, $table= 'product') {
            if (isset($item_id)){
                $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
    
                $resultArray = array();
    
                // fetch product data one by one
                while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $resultArray[] = $item;
                }
    
                return $resultArray;
            }
        }

        public function getProductsByBrand($brand_name, $table = 'product') {
            if (isset($item_id)) {
                $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_brand={$brand_name}");
                $resultArray = array();
                // fetch product data one by one
                while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $resultArray[] = $item;
                }
    
                return $resultArray;
            }
        }
    }
?>