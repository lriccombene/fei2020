<?php

namespace app\modules\apv1\models;

class Categoria extends \app\models\Categoria
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}