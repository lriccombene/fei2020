<?php

namespace app\modules\apv1\models;

class Actasinspeccion extends \app\models\ActasinspeccionSearch
{
    public function fields (){
        return ['id','nro', 'latitud', 'longitud','fec','localidad', 'categoria', 'motivo', 'empresa', 'area'];
    }
/*
    public function extraFields(){
        return [, ]; 
    }*/
}