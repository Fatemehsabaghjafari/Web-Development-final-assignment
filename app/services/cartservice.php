<?php

namespace App\Services;

require_once __DIR__ . '/../repositories/cartrepository.php';

class CartService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new \App\Repositories\CartRepository();
    }

    public function removeItem($itemId)
    {
        $this->repository->removeItem($itemId);
    }

    public function isProductInCart($productName)
    {
        return $this->repository->isProductInCart($productName);
    }

    public function updateQuantity($productId, $newQuantity)
    {
        $this->repository->updateQuantity($productId, $newQuantity);
    }

    public function getAllCartItems()
    {
        return $this->repository->getAllCartItems();
    }

    public function getCartItemCount()
    {
        return $this->repository->getCartItemCount();
    }

    public function insertToCart($products_quantity, $products_name, $products_price)
    {
        try {
            if (!$this->isProductInCart($products_name)) {
                $this->repository->insertToCart($products_quantity, $products_name, $products_price);
                return ['status' => 'success', 'message' => 'Item added to cart!'];
            } else {
                return ['status' => 'error', 'message' => 'Item is already in the cart.'];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
