<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%localidad}}`.
 */
class m200514_193720_create_localidad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%localidad}}', [
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
        $this->dropTable('{{%localidad}}');
    }
}
