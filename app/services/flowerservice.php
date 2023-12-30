<?php
namespace App\Services;
require __DIR__ . '/../repositories/flowerrepository.php';

class FlowerService {
    public function getAll() {
        $repository = new \App\Repositories\FlowerRepository();
        return $repository->getAll();
    }

}