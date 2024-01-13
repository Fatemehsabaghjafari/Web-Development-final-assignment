<?php

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/cartservice.php';

class CartController extends Controller
{
    private $cartService;

    public function __construct()
    {
        $this->cartService = new \App\Services\CartService();
    }

    public function index()
    {
        $cartItemCount = $this->cartService->getCartItemCount();
       // Handle updating item quantity
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'update_quantity':
                    $this->handleUpdateQuantity();
                    break;
                case 'remove_item':
                    $this->handleRemoveItem();
                    break;
            }
        }

        $cartItems = $this->cartService->getAllCartItems();
        $totalAmount = $this->calculateTotalAmount($cartItems);

        include '../views/home/cart.php';
    }

    private function handleUpdateQuantity()
    {
        if (isset($_POST['item_id']) && isset($_POST['new_quantity'])) {
            $itemId = $_POST['item_id'];
            $newQuantity = $_POST['new_quantity'];

            $this->cartService->updateQuantity($itemId, $newQuantity);

            // Redirect back to the cart page after handling the action
            header('Location: cart.php');
            exit;
        }
    }

    private function handleRemoveItem()
    {
        if (isset($_POST['item_id'])) {
            $itemId = $_POST['item_id'];

            $this->cartService->removeItem($itemId);

            // Redirect back to the cart page after handling the action
            header('Location: cart.php');
            exit;
        }
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
