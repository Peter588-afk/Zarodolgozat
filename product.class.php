<?php
class Product{
    private $conn;
    private $table_name="products";

    public $id;
    public $name;
    public $price;
    public $picture;
    public $category;

    public function __construct($db){
        $this->conn=$db;
    }

    function read(){
        $sql="SELECT * from {$this->table_name} order by name";
        $stmt=$this->conn->query($sql);
        return $stmt;
    }
}
?>