<?php

namespace app\modules\apv1\models;

class Localidad extends \app\models\LocalidadSearch
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}