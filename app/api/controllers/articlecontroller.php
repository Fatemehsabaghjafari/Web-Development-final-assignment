<?php

require __DIR__ . '/../../services/articleservice.php';



class ArticleController
{

    private $articleService;
    

    // router maps this to /api/article automatically
    public function index()
    {
        $this->articleService = new \App\Services\ArticleService();

        // Respond to a GET request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

           // Fetch all articles from the service
           $articles = $this->articleService->getAll();

           // Set the response header to JSON
           header('Content-Type: application/json');

           // Return all articles in JSON format
           echo json_encode($articles);

        }

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          
            $json_data = file_get_contents("php://input");


            $article_data = json_decode($json_data, true);

            $title = $article_data['title'];
            $content = $article_data['content'];
            $author = 'Fateme';
            $article = new Article();
            $article->setTitle($title);
            $article->setContent($content);
            $article->setAuthor($author);

            

         $this->articleService->insert($article);

               
        }
    }
}
?>