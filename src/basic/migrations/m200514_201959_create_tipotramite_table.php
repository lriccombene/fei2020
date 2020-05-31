<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipotramite}}`.
 */
class m200514_201959_create_tipotramite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipotramite}}', [
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
        $this->dropTable('{{%tipotramite}}');
    }
}
