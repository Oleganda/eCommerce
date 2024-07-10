<?php
require_once(ROOT_PATH . '/autoload.php');

class ProductModel extends DB
{
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addProduct($name, $description, $price, $stock, $img, $active)
    {
        $ps = $this->conn->prepare('INSERT INTO Products (name, description, price, stock, img, active) 
                                    VALUES (:name, :description, :price, :stock, :img, :active)');
        $ps->bindValue(':name', $name);
        $ps->bindValue(':description', $description);
        $ps->bindValue(':price', $price, PDO::PARAM_STR);
        $ps->bindValue(':stock', $stock, PDO::PARAM_INT);
        $ps->bindValue(':img', $img);
        $ps->bindValue(':active', $active, PDO::PARAM_INT);

        $ps->execute();
        return $this->conn->lastInsertId();
    }
}
