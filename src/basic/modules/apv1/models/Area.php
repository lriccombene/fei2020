<?php

namespace app\modules\apv1\models;

class Area extends \app\models\AreaSearch
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}