<?php

require __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/loginservice.php';

class LoginController extends Controller {
 
  private $loginService;

  public function __construct()
  {
      $this->loginService = new \App\Services\LoginService();
  }

  public function index() {   

      $model = $this->loginService->getAllUsers();
      include '../views/home/login.php';
  }
   
}
