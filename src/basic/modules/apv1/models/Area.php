<?php

namespace app\modules\apv1\models;

class Area extends \app\models\Area
{
    public function fields (){
        return ['id','nombre','descripcion'];
    }
}