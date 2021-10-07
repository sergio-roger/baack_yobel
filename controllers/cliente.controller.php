<?php

require_once './models/cliente.model.php';

class ClienteController{

    public function listar(){
        $clientes = Cliente::where('estado','A')->orderBy('nombres')->get();
        echo json_encode($clientes);
    }
}