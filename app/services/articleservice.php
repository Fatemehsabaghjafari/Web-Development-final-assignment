<?php
namespace App\Services;
require __DIR__ . '/../repositories/articlerepository.php';

class ArticleService {
    public function getAll() {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->getAll();
    }

    public function insert($article) {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->insert($article);
    }
}