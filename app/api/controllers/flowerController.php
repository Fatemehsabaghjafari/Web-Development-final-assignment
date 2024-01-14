<?php

require __DIR__ . '/../../services/flowerservice.php';

class FlowerController{
    
    private $flowerService;

    public function index()
    {
        $this->flowerService = new \App\Services\FlowerService();

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

           $flowers = $this->flowerService->getAll();

           header('Content-Type: application/json');

           echo json_encode($flowers);

        }
    }
}
?>