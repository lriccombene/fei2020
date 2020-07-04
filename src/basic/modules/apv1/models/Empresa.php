<?php

namespace app\modules\apv1\models;

class Empresa extends \app\models\Empresa
{
    public function fields (){
        return ['id','nombre','consultor'];
    }
    public function extraFields(){
        return [ 'consultor' ]; 
    }
}