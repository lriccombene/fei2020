<?php

namespace app\modules\apv1\models;

class Tipodictamen extends \app\models\TipodictamenSearch
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}