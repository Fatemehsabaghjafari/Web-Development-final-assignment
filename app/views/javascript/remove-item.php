<?php
// remove_item.php

require_once __DIR__ . '/../../repositories/CartRepository.php';

// Perform necessary validation/authentication

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the item ID from the request
    $itemId = $_POST['id'];

    // Instantiate CartRepository
    $cartRepository = new CartRepository();

    // Remove the item from the cart
    try {
        $cartRepository->removeItem($itemId);
        echo json_encode(['success' => true, 'message' => 'Item removed successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
    }
} else {
    // Handle invalid requests (e.g., redirect to an error page)
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
