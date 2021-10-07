<?php

require_once './models/pedido.model.php';

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public $timestamps = false;
    protected $fillable = ['dni', 'nombres', 'apellidos', 'estado'];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
