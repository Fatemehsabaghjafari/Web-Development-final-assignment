<?php

class PatternRouter
{
    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    private function loadController($controllerName, $api = false)
    {
        // Adjust the namespace based on API or regular controllers
        $namespace = $api ? '\\app\\api\\controllers\\' : '\\app\\controllers\\';
    
        // Adjust the path based on API or regular controllers
        $path = $api ? 'api/controllers/' : 'controllers/';
    
        // Load the file with the controller class
        $filename = __DIR__ . "/$path$controllerName.php";
    
        $controllerFullName = $namespace . $controllerName;
    
        if (file_exists($filename)) {
            require_once $filename;
        } else {
            throw new \Exception('Controller not found', 404);
        }
    
        return $controllerFullName;
    }
    
    public function route($uri)
    {
        try {
            // Check if we are requesting an API route
            $api = false;
            if (str_starts_with($uri, "api/")) {
                $uri = substr($uri, 4);
                $api = true;
            }
    
            // Set default controller/method
            $defaultController = 'home';
            $defaultMethod = 'index';
    
            // Ignore query parameters
            $uri = $this->stripParameters($uri);
    
            // Read controller/method names from URL
            $explodedUri = explode('/', $uri);
    
            $controllerName = ucfirst(empty($explodedUri[0]) ? $defaultController : $explodedUri[0]) . "Controller";
            $methodName = empty($explodedUri[1]) ? $defaultMethod : $explodedUri[1];
    
            // Load the controller
            $controllerFullName = $this->loadController($controllerName, $api);
    
            // Instantiate the appropriate service based on API or regular controllers
            $serviceNamespace = $api ? '\\App\\Services\\ArticleService' : '\\App\\Services\\FlowerService';
            $service = new $serviceNamespace();
    
            // Instantiate the controller and pass the service as a dependency
            $controllerObj = new $controllerFullName($service);
            $controllerObj->{$methodName}();
        } catch (\Exception $e) {
            // Log the exception or display a user-friendly error page
            error_log($e->getMessage());
            http_response_code($e->getCode() ?: 500);
            // Display a user-friendly error page or message
            echo 'Error: ' . $e->getMessage();
        }
    }
}    