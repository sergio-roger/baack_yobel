<?php

require_once './models/cliente.model.php';

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    protected $fillable = ['cliente_id', 'codigo', 'fecha', 'estado'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}