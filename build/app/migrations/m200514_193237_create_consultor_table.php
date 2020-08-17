<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consultor}}`.
 */
class m200514_193237_create_consultor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consultor}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'apellido' => $this->string(),
            'telefono' => $this->string(),
            'email' => $this->string(),
            'domicilio' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%consultor}}');
    }
}
