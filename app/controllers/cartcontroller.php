<?php

require __DIR__ . '/controller.php';

class CartController extends Controller  {
   
    public function index() {  
     
        include '../views/home/cart.php';
    }
   
}