<?php

require_once './vendor/autoload.php';
require_once './app/conexion.php';
require_once './controllers/pedido.controller.php';
require_once './controllers/cliente.controller.php';

$http = $_SERVER['REQUEST_METHOD'];

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : false;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : false;

$controller = strtolower($controller);
$accion = strtolower($accion);

$pedidosController = new PedidoController();
$clienteController = new ClienteController();

if($http == 'GET'){

    if($controller == 'pedidos'){
        if($accion == 'listar'){
            $pedidosController->listar();   
        }else
        if($accion == 'buscar'){
            $id = (isset($_GET['id'])) ? $_GET['id'] : false;
            $pedidosController->buscar($id);   
        }
    }else
    if($controller == 'cliente'){
        if($accion == 'listar'){
            $clienteController->listar();   
        }
    }
}else
if($http == 'POST'){
    $data = json_decode(file_get_contents('php://input'));
    $model = $data->model;
    $accion =$data->accion;

    if($model == 'pedido'){
        if($accion == 'insertar'){
            $datos = $data->data;
            $pedidosController->guardar($datos);
            
        }else
        if($accion == 'actualizar'){
            $datos = $data->data;
            $pedidosController->editar($datos);
            
        }else
        if($accion == 'eliminar'){
            $datos = $data->data;
            $pedidosController->eliminar($datos);
            
        }
    }
}
