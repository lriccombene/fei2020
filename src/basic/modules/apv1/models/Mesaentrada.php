<?php

namespace app\modules\apv1\models;

class Mesaentrada extends \app\models\Mesaentrada
{
    public function fields (){
        return ['fec','fec_ingreso','tramite','descripcion'];
    }

    public function extraFields(){
        return [ 'categoria','empresa' ]; 
    }
}