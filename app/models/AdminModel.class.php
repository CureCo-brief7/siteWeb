<?php
class AdminModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE Email = :email AND Role = 1");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount())
            return true;
        else
            return false;
    }
    public function getProductByIdUser($id)
    {
        $this->db->query("SELECT * FROM product WHERE User_id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->fetchAll();
    }
    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        return $this->db->fetchAll();
    }
    public function register($name, $email, $password)
    {
        $Role = 1;
        $this->db->query('INSERT INTO users(userName,Email,Password,Role) VALUES (:name,:email,:password,:Role)');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':Role', $Role);
        if ($this->db->execute())
            return true;
        else
            return false;
    }
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE Email = :email AND Role = 1");
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        $hashed_password = $row->Password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }

    }
    public function countItems($item, $table)
    {

        $this->db->query("SELECT COUNT($item) FROM $table");

        $this->db->execute();

        return $this->db->fetchColumn();
    }
    public function getPrix($ord)
    {
        $query = "SELECT * FROM `product` ORDER BY `product`.`Price` $ord";
        $this->db->query($query);
        $this->db->execute();
        $products = $this->db->fetchAll();
        if ($products)
            return $products[0];
        else
            return false;
    }
    public function sumPrice()
    {
        $this->db->query('SELECT SUM(Price) FROM product');
        $this->db->execute();
        $count = $this->db->fetchColumn();
        return $count;
    }
}