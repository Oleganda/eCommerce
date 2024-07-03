<?php
// Database connection
class DB
{
    private $host = '127.0.0.1:3308';
    private $dbname = 'onlineShop';
    private $username = 'root';
    private $password = '';
    protected $conn;

    public function connect()
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        return $this->conn;
    }
}


// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Connection failed: " . $e->getMessage());
// }
