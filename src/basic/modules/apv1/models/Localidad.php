<?php

namespace app\modules\apv1\models;

class Localidad extends \app\models\Localidad
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}