<?php

namespace app\modules\apv1\models;

class Motivo extends \app\models\Motivo
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}