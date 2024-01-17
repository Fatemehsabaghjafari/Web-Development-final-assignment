<?php
require __DIR__ . '/../../services/cartservice.php';

class CartController {
    private $cartService;

    public function __construct() {
        $this->cartService = new \App\Services\CartService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $cartitems = $this->cartService->getAllCartItems();
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'cartItems' => $cartitems]);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePostRequest();
        }
    }

    private function handlePostRequest() {
        $postData = json_decode(file_get_contents("php://input"), true);

        if (!$postData || !isset($postData['action'])) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request data']);
            exit;
        }

        switch ($postData['action']) {
            case 'modifyQuantity':
                $itemId = $postData['itemId'];
                $change = $postData['change'];
                $this->cartService->updateQuantity($itemId, $change);
                echo json_encode(['status' => 'success', 'message' => 'Quantity modified.']);
                exit;
            case 'removeItem':
                $itemId = $postData['itemId'];
                $this->cartService->removeItem($itemId);
                echo json_encode(['status' => 'success', 'message' => 'Item removed from cart.']);
                exit;
            default:
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
                exit;
        }
    }
}
?>
