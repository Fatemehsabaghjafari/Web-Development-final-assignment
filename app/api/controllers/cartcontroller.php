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
           echo json_encode($cartitems);
        }

        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST['action']) {
                case 'modifyQuantity':
                    $itemId = $_POST['itemId'];
                    $change = $_POST['change'];
                    $this->cartService->updateQuantity($itemId, $change);
                    echo json_encode(['status' => 'success', 'message' => 'Quantity modified.']);
                    exit;
                case 'removeItem':
                    $itemId = $_POST['itemId'];
                    $this->cartService->removeItem($itemId);
                    echo json_encode(['status' => 'success', 'message' => 'Item removed from cart.']);
                    exit;
                default:
                    http_response_code(400);
                    echo json_encode(['success' => false, 'message' => 'Invalid action']);
                    exit;
            }
        }
    }

   
}
?>
