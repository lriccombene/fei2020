<?php

namespace app\modules\apv1\models;

class Enviosdocumentacion extends \app\models\Enviosdocumentacion
{
    public function fields (){
        return ['fec','transporte','detalle','archivo_urlnotificado','destino','fec_notificado'];
    }

    public function extraFields(){
        return [ 'relevancia' ]; 
    }
}
