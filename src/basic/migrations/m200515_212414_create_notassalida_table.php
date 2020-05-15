<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notassalida}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categoria}}`
 * - `{{%empresa}}`
 */
class m200515_212414_create_notassalida_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notassalida}}', [
            'id' => $this->primaryKey(),
            'fec_emision' => $this->date(),
            'id_categoria' => $this->integer()->notNull(),
            'id_empresa' => $this->integer()->notNull(),
            'detalle' => $this->text(),
            'notificado' => $this->boolean(),
            'fec_notificado' => $this->date(),
        ]);

        // creates index for column `id_categoria`
        $this->createIndex(
            '{{%idx-notassalida-id_categoria}}',
            '{{%notassalida}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-notassalida-id_categoria}}',
            '{{%notassalida}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-notassalida-id_empresa}}',
            '{{%notassalida}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-notassalida-id_empresa}}',
            '{{%notassalida}}',
            'id_empresa',
            '{{%empresa}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%categoria}}`
        $this->dropForeignKey(
            '{{%fk-notassalida-id_categoria}}',
            '{{%notassalida}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-notassalida-id_categoria}}',
            '{{%notassalida}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-notassalida-id_empresa}}',
            '{{%notassalida}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-notassalida-id_empresa}}',
            '{{%notassalida}}'
        );

        $this->dropTable('{{%notassalida}}');
    }
}
