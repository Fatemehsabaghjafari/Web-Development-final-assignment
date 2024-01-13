<?php
require __DIR__ . '/controller.php';
class LoginController extends Controller {
 
    public function index() {   
      include '../views/home/login.php';
  }
   
}
