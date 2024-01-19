<?php

require_once __DIR__ . '/../services/flowerservice.php';
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/controller.php';

class SearchController extends Controller
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
      //$cartItemCount = $this->cartService->getCartItemCount();

        $filteredFlowers = $this->flowerService->search();

        include '../views/home/search.php';
    }

}
