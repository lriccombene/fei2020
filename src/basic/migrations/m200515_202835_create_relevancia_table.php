<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%relevancia}}`.
 */
class m200515_202835_create_relevancia_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%relevancia}}', [
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
        $this->dropTable('{{%relevancia}}');
    }
}
