<?php

namespace app\modules\apv1\models;

class Tipotramite extends \app\models\TipotramiteSearch
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}
