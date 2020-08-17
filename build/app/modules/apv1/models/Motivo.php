<?php

namespace app\modules\apv1\models;

class Motivo extends \app\models\MotivoSearch
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}