<?php

namespace app\modules\apv1\models;

class Relevancia extends \app\models\Relevancia
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}