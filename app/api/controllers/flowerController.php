<?php

require __DIR__ . '/../../services/flowerservice.php';
class FlowerController{
    private $flowerService;

    // initialize services
    function __construct()
    {
        $this->flowerService = new \App\Services\FlowerService();
    }

}