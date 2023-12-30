<?php
namespace App\Repositories;
use PDO;
class UserRepository {
private $db;
public function __construct() {
    include(__DIR__ . '/../config/dbconfig.php');
$this->db = new PDO("$type:host=$servername;dbname=$dbname",
$username, $password);
}
public function getAllUsers() {
    $stmt = $this->db->query('SELECT * FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\User');
    return $users;
    
}

}