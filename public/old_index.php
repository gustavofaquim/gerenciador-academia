<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();


require_once '../app/controllers/UserController.php';
require_once '../app/controllers/TrainingController.php';
require_once '../app/functions/auth.php';


if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);

  

    $controllerName = ucfirst($url[0]) . 'Controller';
    $methodName = isset($url[1]) ? $url[1] : 'index';
    $params = array_slice($url, 2);

    
    $protectedRoutes = [
        'UserController' => ['create', 'doCreate'], // Adicione outros métodos aqui
        'TrainingController' => ['create'] // Adicione outros métodos aqui
    ];
    

    if (isset($protectedRoutes[$controllerName]) && in_array($methodName, $protectedRoutes[$controllerName])) {
        requireAuth();
    }


    $controllerFile = "../app/controllers/$controllerName.php";

    var_dump('<h2>'.$controllerFile. '</h2>');
    exit();

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerName();

        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $params);
        } else {
            echo "Método não encontrado";
        }
    } else {
        echo "Controlador não encontrado";
    }
} else {
    // Rota padrão, por exemplo, página inicial ou redirecionamento
}
