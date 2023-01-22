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
    public function getProduct($id)
    {
        $this->db->query("SELECT * FROM product WHERE id_p = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->fetchAll();
    }
    public function getProducts()
    {
        $this->db->query("SELECT * FROM product");
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
    public function updateProduct($name, $Prix, $Quantity, $Description, $Image, $id)
    {
        $date = date("Y") . "-" . date("m") . "-" .date("d");
        $this->db->query("UPDATE 
                                product
                          SET 
                                Name =:name,
                                Description = :desc,
                                Price = :price,
                                Quantity = :quan,
                                Image = :img,
                                date = :date
                          WHERE 
                                id_p = :id_p
                        ");
        $this->db->bind(':name', $name);
        $this->db->bind(':desc', $Description);
        $this->db->bind(':price', $Prix);
        $this->db->bind(':quan', $Quantity);
        $this->db->bind(':date', $date);
        $this->db->bind(':img', $Image);
        $this->db->bind(':id_p', $id);
        $this->db->execute();
    }
    public function updateProductSansImage($name, $Prix, $Quantity, $Description, $id)
    {
        $date = date("Y") . "-" . date("m") . "-" .date("d");
        $this->db->query("UPDATE 
                                product
                          SET 
                                Name =:name,
                                Description = :desc,
                                Price = :price,
                                Quantity = :quan,
                                date = :date
                          WHERE 
                                id_p = :id_p
                        ");
        $this->db->bind(':name', $name);
        $this->db->bind(':desc', $Description);
        $this->db->bind(':price', $Prix);
        $this->db->bind(':quan', $Quantity);
        $this->db->bind(':date', $date);
        $this->db->bind(':id_p', $id);
        $this->db->execute();
    }
    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM product WHERE id_p = :id_p");
        $this->db->bind(':id_p', $id);
        $this->db->execute();
    }
    public function addProduct($name, $Prix, $Quantity, $Description, $Image)
    {
        $date = date("Y") . "-" . date("m") . "-" .date("d");
        $userId = $_SESSION['user_id'];
        $this->db->query("INSERT INTO product (Name, Description, Price, Quantity, Image, User_id,date) VALUES (:name,:desc,:price,:quan,:img,:userId,:date)");
        $this->db->bind(':name', $name);
        $this->db->bind(':desc', $Description);
        $this->db->bind(':price', $Prix);
        $this->db->bind(':quan', $Quantity);
        $this->db->bind(':img', $Image);
        $this->db->bind(':userId', $userId);
        $this->db->bind(':date', $date);
        $this->db->execute();
    }
    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM users WHERE id_u = :id_u");
        $this->db->bind(':id_u', $id);
        $this->db->execute();
    }
    public function trie( $by, $order )
    {
        $sql = 'SELECT * FROM `product` ORDER BY `product`.`' . $by . '` ' . $order;
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->fetchAll();
    }
    function search($libelle){
        $this->db->query(" SELECT 
                                * 
                            FROM 
                                product p 
                            WHERE 
                                p.Name LIKE '%$libelle%' 
                            OR 
                                p.Description LIKE '%$libelle%' 
                            OR 
                                p.Price LIKE '%$libelle%' 
                            OR 
                                p.Quantity LIKE '%$libelle%' 
                            OR 
                                p.date LIKE '%$libelle%'
                        ");
        $this->db->execute();
        $data = $this->db->fetchAll();
        return $data;
    }
}