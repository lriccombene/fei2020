<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%empresa}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%consultor}}`
 */
class m200514_211029_create_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empresa}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'descripcion' => $this->string(),
            'id_consultor' => $this->integer()->notNull(),
            'razon_social' => $this->string(),
            'contacto' => $this->string(),
            'referente' => $this->string(),
            'title' => $this->string(),
            'body' => $this->text(),
        ]);

        // creates index for column `id_consultor`
        $this->createIndex(
            '{{%idx-empresa-id_consultor}}',
            '{{%empresa}}',
            'id_consultor'
        );

        // add foreign key for table `{{%consultor}}`
        $this->addForeignKey(
            '{{%fk-empresa-id_consultor}}',
            '{{%empresa}}',
            'id_consultor',
            '{{%consultor}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%consultor}}`
        $this->dropForeignKey(
            '{{%fk-empresa-id_consultor}}',
            '{{%empresa}}'
        );

        // drops index for column `id_consultor`
        $this->dropIndex(
            '{{%idx-empresa-id_consultor}}',
            '{{%empresa}}'
        );

        $this->dropTable('{{%empresa}}');
    }
}
