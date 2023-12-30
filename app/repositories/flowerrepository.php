<?php
namespace App\Repositories;
require_once __DIR__ . '/../models/flower.php';
use PDO;
class FlowerRepository {
private $db;
public function __construct() {
    include(__DIR__ . '/../config/dbconfig.php');
$this->db = new PDO("$type:host=$servername;dbname=$dbname",
$username, $password);
}
public function getAll() {
    $stmt = $this->db->query('SELECT * FROM flowers');
    $flowers = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Flower');
    return $flowers;
    
}

}