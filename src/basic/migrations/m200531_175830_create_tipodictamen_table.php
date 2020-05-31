<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipodictamen}}`.
 */
class m200531_175830_create_tipodictamen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipodictamen}}', [
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
        $this->dropTable('{{%tipodictamen}}');
    }
}
