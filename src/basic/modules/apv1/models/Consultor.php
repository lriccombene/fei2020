<?php

namespace app\modules\apv1\models;

class Consultor extends \app\models\Consultor
{
    public function fields (){
        return ['apellido', 'nombre','email'];
    }
}