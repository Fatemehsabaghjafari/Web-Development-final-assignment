<?php
namespace App\Controllers;
//use App\Repositories\ArticleRepository;
use App\Services\ArticleService;
//use App\Services\FlowerService;

class ArticleController {
//private $articleRepository;
private $articleService;
function __construct()
{
  //$this->articleRepository = new ArticleRepository();
  $this->articleService = new ArticleService();
}
public function index() {
//$model = $this->articleRepository->getAll();
$model = $this->articleService->getAll();
require '../views/article/index.php';
}
public function create() {
if($_SERVER['REQUEST_METHOD'] == "GET") {
require '../views/article/create.php';
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
$title = htmlspecialchars($_POST['title']);
$author = htmlspecialchars($_POST['author']);
$content = $_POST['content'];
$article = new \App\Models\Article();
$article->title = $title;
$article->author = $author;
$article->content = $content;
$this->articleRepository->insert($article);
$this->index();
}
}
}