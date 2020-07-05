<?php

namespace app\modules\apv1\models;

class Mesaentrada extends \app\models\Mesaentrada
{
    public function fields (){
        return ['id','fec','fec_ingreso','tramite','descripcion','categoria','empresa'];
    }

  //  public function extraFields(){
  //      return [  ]; 
  //  }
}