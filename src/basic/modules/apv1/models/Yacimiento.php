<?php

namespace app\modules\apv1\models;

class Yacimiento extends \app\models\Yacimiento
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}