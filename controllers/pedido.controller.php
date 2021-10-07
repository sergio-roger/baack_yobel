<?php

require_once './models/pedido.model.php';

class PedidoController {

    public function listar(){
        $pedidos = Pedido::where('estado', 'A')->get();

        if($pedidos){
            foreach($pedidos as $p)
                $p->cliente;
        }
        echo json_encode($pedidos);
    }

    public function guardar($data){
        $existe = Pedido::where('codigo', $data->codigo)->get()->first();
        $response = [];

        if($existe){
            $response = [
                'status' => false,
                'msj' => 'El codigo ya existe'
            ];
        }else{
            $nuevo = new Pedido();
            $nuevo->cliente_id = intval($data->cliente_id);
            $nuevo->codigo = $data->codigo;
            $nuevo->fecha = $data->fecha;
            $nuevo->estado = 'A';
            $nuevo->save();

            $response = [
                'status' => true,
                'msj' => 'Se guardo el pedido'
            ];
        }

        echo json_encode($response);
    }

    public function editar($datos){
       
        $id = intval($datos->id);
        $pedido = Pedido::find($id);

        $pedido->fecha = $datos->fecha;
        $pedido->cliente_id = $datos->cliente_id;
        $pedido->save();

        $response = [
            'status' => true,
            'msj' => 'Se actualizo el pedido'
        ];
        echo json_encode($response);
    }

    public function eliminar($datos){
        $id = intval($datos->id);

        $pedido = Pedido::find($id);
        $pedido->estado = 'I';
        $pedido->save();

        $response = [
            'status' => true,
            'msj' => 'Se ha eliminado'
        ];

        echo json_encode($response);
        }

    public function buscar($id){
        $pedido = Pedido::find($id);

        if($pedido){
            $pedido->cliente;
        }else{
            $pedido = false;
        }

        echo json_encode($pedido);
    }
}   