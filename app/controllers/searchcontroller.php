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

      if (isset($_POST['add_to_cart'])) {
        $this->handleAddToCart();
      }

        $filteredFlowers = $this->flowerService->search();

        include '../views/home/search.php';
    }

    private function handleAddToCart()
    {
        $products_quantity = 1;
        $products_name = $_POST['product_name'];
        $products_price = $_POST['product_price'];

       // Check if the product is already in the cart
       if ($this->cartService->isProductInCart($products_name)) {
        // Display a message indicating that the item is already in the cart
        $display_message = "Item is already in the cart.";
        echo "Item is already in the cart.";
    } else {
        // The product is not in the cart, proceed with adding to the cart
        $display_message = "Item added to cart!";
        echo "Item added to cart!";
        $this->cartService->insertToCart($products_quantity, $products_name, $products_price);
    }
    }
}
