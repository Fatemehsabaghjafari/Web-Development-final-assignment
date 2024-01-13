<?php
namespace App\Repositories;
require_once __DIR__ . '/../models/flower.php';
use PDO;

class FlowerRepository {
    private $db;

    public function __construct() {
        include(__DIR__ . '/../config/dbconfig.php');
        $this->db = new PDO("$type:host=$servername;dbname=$dbname", $username, $password);
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM flowers');
        $flowers = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Flower');
        return $flowers;
    }

    public function search()
    {
        if (isset($_POST["submit"])) {
            $searchQuery = $_POST["search"];
    
            if (empty($searchQuery)) {
                $sql = "SELECT * FROM flowers";
            } else {
                $sql = "SELECT * FROM flowers WHERE Name LIKE :searchQuery";
            }
    
            $stmt = $this->db->prepare($sql);
    
            if (!empty($searchQuery)) {
                $searchValue = '%' . $searchQuery . '%';
                $stmt->bindParam(':searchQuery', $searchValue, PDO::PARAM_STR);
            }
    
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
    
            $filteredFlowers = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Flower');
    
            if (!empty($filteredFlowers)) {
                include __DIR__ . '/../views/home/search-flowers.php';
            } else {
                echo "No matching flowers found.";
            }
        }
    }
    
}
?>
