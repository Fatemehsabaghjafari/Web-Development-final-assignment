<?php
require __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/controller.php';

class CartController extends Controller {
    private $cartService;

    public function __construct() {
        $this->cartService = new \App\Services\CartService();
    }

    public function index() {
       
        $cartItems = $this->cartService->getAllCartItems();
        $totalAmount = $this->calculateTotalAmount($cartItems);
	    $cartItemCount = $this->cartService->getCartItemCount();
        include '../views/home/cart.php';
    }

    private function calculateTotalAmount($cartItems)
    {
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item->quantity * $item->price;
        }

        return $totalAmount;
    }
}
?>
