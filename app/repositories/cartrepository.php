<?php

namespace App\Repositories;
require_once __DIR__ . '/../models/cart.php';
use PDO;


class CartRepository
{
    private $db;

    public function __construct()
    {
        include(__DIR__ . '/../config/dbconfig.php');
        $this->db = new PDO("$type:host=$servername;dbname=$dbname", $username, $password);
    }
    public function insertToCart($products_quantity, $products_name, $products_price)
    {
        $stmt = $this->db->prepare("INSERT INTO cart (quantity, name, price) VALUES (:quantity, :name, :price)");
        $stmt->bindParam(':quantity', $products_quantity);
        $stmt->bindParam(':name', $products_name);
        $stmt->bindParam(':price', $products_price);    
        $stmt->execute();
    }
    
}
