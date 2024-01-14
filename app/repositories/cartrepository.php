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

    public function removeItem($itemId)
    {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE id = :item_id");
        $stmt->bindParam(':item_id', $itemId);
        $stmt->execute();
    }

    public function isProductInCart($productName)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM cart WHERE name = :name");
        $stmt->bindParam(':name', $productName);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function updateQuantity($productId, $newQuantity)
    {
        $stmt = $this->db->prepare("UPDATE cart SET quantity = :quantity WHERE id = :id");
        $stmt->bindParam(':quantity', $newQuantity);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
    }

    public function getAllCartItems()
    {
    $stmt = $this->db->prepare("SELECT * FROM cart");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }   

    public function getCartItemCount()
    {
    $stmt = $this->db->prepare("SELECT COUNT(*) FROM cart");
    $stmt->execute();
    return $stmt->fetchColumn();
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
