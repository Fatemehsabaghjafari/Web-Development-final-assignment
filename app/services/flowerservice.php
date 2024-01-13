<?php

namespace App\Services;

require_once __DIR__ . '/../repositories/flowerrepository.php';

class FlowerService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new \App\Repositories\FlowerRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function search()
    {
        return $this->repository->search();
    }
}
