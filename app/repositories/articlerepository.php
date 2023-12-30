<?php
namespace App\Repositories;

require __DIR__ . '/../models/article.php';

use PDO;
class ArticleRepository {
private $db;
public function __construct() {
    include(__DIR__ . '/../config/dbconfig.php');
$this->db = new PDO("$type:host=$servername;dbname=$dbname",
$username, $password);
}
public function getAll() {
    $stmt = $this->db->query('SELECT * FROM articles');
    $articles = $stmt->fetchAll();
    return $articles;
    
}
public function insert($article) {
$stmt = $this->db->prepare("INSERT INTO articles
(title, content, author)
VALUES (:title, :content, :author)");
$results = $stmt->execute([':title' => $article->title,
':content' => $article->content,
':author' => $article->author]);
return $results;
}
// feel free to extend this with delete and update methods
}