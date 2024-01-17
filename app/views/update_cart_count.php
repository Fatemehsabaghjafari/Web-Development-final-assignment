// update_cart_count.php
<?php
require_once __DIR__ . '/../services/cartservice.php';

$cartService = new \App\Services\CartService();
$cartItemCount = $cartService->getCartItemCount();

echo $cartItemCount;
?>
