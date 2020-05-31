<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yacimiento}}`.
 */
class m200514_193629_create_yacimiento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%yacimiento}}', [
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
        $this->dropTable('{{%yacimiento}}');
    }
}
