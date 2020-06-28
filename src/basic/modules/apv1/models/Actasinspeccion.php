<?php

namespace app\modules\apv1\models;

class Actasinspeccion extends \app\models\Actasinspeccion
{
    public function fields (){
        return ['nro', 'latitud', 'longitud','fec','localidad', 'categoria', 'motivo', 'empresa', 'area'];
    }
/*
    public function extraFields(){
        return [, ]; 
    }*/
}