<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%motivo}}`.
 */
class m200514_194017_create_motivo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%motivo}}', [
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
        $this->dropTable('{{%motivo}}');
    }
}
