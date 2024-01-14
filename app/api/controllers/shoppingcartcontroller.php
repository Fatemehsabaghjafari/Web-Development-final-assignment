<?php

session_start();

require __DIR__ . '/../../services/cartservice.php';

class ShoppingcartController {
    private $cartService;

    public function index() {
        $this->cartService = new \App\Services\CartService();

        // Retrieve cart items from session
        $cartitems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        if (empty($cartitems)) {
            $cartitems = $this->cartService->getAllCartItems();
            $_SESSION['cart'] = $cartitems;
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            header('Content-Type: application/json');
            echo json_encode($cartitems);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $json_data = file_get_contents("php://input");
            $request_data = json_decode($json_data, true);

            if (isset($request_data['id'])) {
                $itemId = $request_data['id'];

                try {
                    // Remove the item from the cart
                    //$this->cartService->removeItem($itemId);

                    // Update session with the latest cart items
                    $_SESSION['cart'] = $this->cartService->getAllCartItems();

                    echo json_encode(['success' => true, 'message' => 'Item removed successfully']);
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Invalid request']);
            }
        }
        include '/../../views/home/cart.php';
    }
}
?>
