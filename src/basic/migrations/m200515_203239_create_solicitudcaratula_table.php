<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%solicitudcaratula}}`.
 */
class m200515_203239_create_solicitudcaratula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%solicitudcaratula}}', [
            'id' => $this->primaryKey(),
            'fec' => $this->date()->notNull(),
            'extracto' => $this->string(),
            'recibido' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%solicitudcaratula}}');
    }
}
