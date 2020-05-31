<?php

use yii\db\Migration;

/**
 * Class m200427_154318_crear_table_party_party
 */
class m200427_154318_crear_table_party_party extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('party_party', [
            'id_party' => $this->primaryKey(),
            'apellido' => $this->string()->notNull(),
            'nombre' => $this->string()->notNull(),
            'num_doc' =>$this->string()->notNull()->unique() ,
            'estado_civil' => $this->string(100),
            'tipo_doc' => $this->string(100),
            'fec_nac' => $this->date(),
            'estado_civil' => $this->string(100),
            'limite_credito' => $this->money(),
            'estado' => $this->string(100),

        ]);
    }

    /**
         * 
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('party_party');
        return false;

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200427_154318_crear_table_party_party cannot be reverted.\n";

        return false;
    }
    */
}
