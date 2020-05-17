<?php

namespace app\modules\apv1\models;

class Tipodictamen extends \app\models\Tipodictamen
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}