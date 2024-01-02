<?php
require __DIR__ . '/../services/flowerservice.php';
require __DIR__ . '/controller.php';

class HomeController extends Controller  {
    // private $flowerService;

    public function index() {  
      // $this->flowerService = $flowerService;
      //  $model = $this->flowerService->getAll();    
        include '../views/home/index.php';
    }
   
}
