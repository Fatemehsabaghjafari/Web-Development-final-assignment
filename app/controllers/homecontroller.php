<?php

require_once __DIR__ . '/../services/flowerservice.php';
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/controller.php';

class HomeController extends Controller
{
    private $flowerService;
    private $cartService;

    public function __construct()
    {
        $this->flowerService = new \App\Services\FlowerService();
        $this->cartService = new \App\Services\CartService();
    }

    public function index()
    {
      // $cartItemCount = $this->cartService->getCartItemCount();
        
        $flowers = $this->flowerService->getAll();
        include '../views/home/index.php';
    }
}
