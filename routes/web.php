<?php
require_once '../controllers/ProductoController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'ProductoController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controllerInstance = new $controller();

if ($id) {
    $controllerInstance->$action($id);
} else {
    $controllerInstance->$action();
}
?>
