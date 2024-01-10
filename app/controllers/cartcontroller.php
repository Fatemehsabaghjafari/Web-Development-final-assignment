<?php

require __DIR__ . '/controller.php';
require __DIR__ . '/../repositories/cartrepository.php';

class CartController extends Controller
{
    private $cartRepository;

    public function __construct()
    {
        $this->cartRepository = new \App\Repositories\CartRepository();
    }

    public function index()
    {
        include '../views/home/cart.php';
    }

    public function addToCart()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $flowerId = $data['flowerId'];
        $quantity = $data['quantity'];

        $success = $this->cartRepository->addToCart($flowerId, $quantity);

        return $this->respondWithJson(['success' => $success]);
    }

    public function getCartItems()
    {
        $cartItems = $this->cartRepository->getCartItems();

        return $this->respondWithJson(['success' => true, 'cartItems' => $cartItems]);
    }
}
