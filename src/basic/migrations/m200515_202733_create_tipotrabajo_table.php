<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipotrabajo}}`.
 */
class m200515_202733_create_tipotrabajo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipotrabajo}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'descripcion' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipotrabajo}}');
    }
}
