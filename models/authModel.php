<?php
require_once(ROOT_PATH . '/autoload.php');

class AuthModel extends DB
{
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function register($fname, $lname, $email, $phone, $pass)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $ps = $this->conn->prepare('INSERT INTO Users (fname, lname, email, phone, password, role) 
                                    VALUES (:fname, :lname, :email, :phone, :password, 0)');

        $ps->bindValue(':fname', $fname);
        $ps->bindValue(':lname', $lname);
        $ps->bindValue(':email', $email);
        $ps->bindValue(':phone', $phone);
        $ps->bindValue(':password', $pass);

        $ps->execute();
        return $this->conn->lastInsertId();
    }
}
