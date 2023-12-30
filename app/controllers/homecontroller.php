<?php
namespace App\Controllers;

use App\Services\FlowerService;

//require __DIR__ . '/controller.php';
require __DIR__ . '/../services/flowerservice.php';


//extends Controller 
class HomeController {
  private $flowerService;

    public function __construct(FlowerService $flowerService) {
        $this->flowerService = $flowerService;
    }

    public function index() {  
        $model = $this->flowerService->getAll();    
        include '../views/home/index.php';
    }
    public function login() {   
      include '../views/home/login.php';
  }
    public function about() {
        include '../views/home/about.php';
    }
}
