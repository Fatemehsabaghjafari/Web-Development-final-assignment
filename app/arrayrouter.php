<?php
class ArrayRouter {
    public function route($uri) {
      
        $routes = array(
            '' => array(
                'controller' => 'logincontroller',
                'method' => 'index'
            ),

            'login' => array(
                'controller' => 'logincontroller',
                'method' => 'index'
            ),

            'register' => array(
               'controller' => 'registercontroller', 
                'method' => 'register'
             ),
             'home' => array(
                'controller' => 'homecontroller', 
                 'method' => 'index'
              ),
              'search' => array(
                'controller' => 'searchcontroller', 
                 'method' => 'index'
              ),
              'cart' => array(
                'controller' => 'cartcontroller', 
                 'method' => 'index'
              ),

            
        );

        // Add this method to handle JSON responses
     function jsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

        // deal with undefined paths first
        if(!isset($routes[$uri]['controller']) || !isset($routes[$uri]['method'])) {
            http_response_code(404);
            die();
        }

        // dynamically instantiate controller and method
        $controller = $routes[$uri]['controller'];
        $method = $routes[$uri]['method'];

        require __DIR__ . '/controllers/' . $controller . '.php';
        $controllerObj = new $controller;
        $controllerObj->$method();
    }
}
?>