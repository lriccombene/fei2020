<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%residuos}}`.
 */
class m201028_152308_create_residuos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%residuos}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'cuit' => $this->string(),
            'tiporesiduo' => $this->string(),
            'telefono' => $this->string(),
            'email' => $this->string(),
            'domicilio' => $this->string(),
            'nro' => $this->integer()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%residuos}}');
    }
}
