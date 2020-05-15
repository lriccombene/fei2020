<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dictamenestecnicos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categoria}}`
 * - `{{%empresa}}`
 * - `{{%area}}`
 */
class m200515_215008_create_dictamenestecnicos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dictamenestecnicos}}', [
            'id' => $this->primaryKey(),
            'fec' => $this->date(),
            'nro' => $this->integer()->notNull(),
            'id_categoria' => $this->integer()->notNull(),
            'id_empresa' => $this->integer()->notNull(),
            'id_area' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_categoria`
        $this->createIndex(
            '{{%idx-dictamenestecnicos-id_categoria}}',
            '{{%dictamenestecnicos}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-dictamenestecnicos-id_categoria}}',
            '{{%dictamenestecnicos}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-dictamenestecnicos-id_empresa}}',
            '{{%dictamenestecnicos}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-dictamenestecnicos-id_empresa}}',
            '{{%dictamenestecnicos}}',
            'id_empresa',
            '{{%empresa}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_area`
        $this->createIndex(
            '{{%idx-dictamenestecnicos-id_area}}',
            '{{%dictamenestecnicos}}',
            'id_area'
        );

        // add foreign key for table `{{%area}}`
        $this->addForeignKey(
            '{{%fk-dictamenestecnicos-id_area}}',
            '{{%dictamenestecnicos}}',
            'id_area',
            '{{%area}}',
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
            '{{%fk-dictamenestecnicos-id_categoria}}',
            '{{%dictamenestecnicos}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-dictamenestecnicos-id_categoria}}',
            '{{%dictamenestecnicos}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-dictamenestecnicos-id_empresa}}',
            '{{%dictamenestecnicos}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-dictamenestecnicos-id_empresa}}',
            '{{%dictamenestecnicos}}'
        );

        // drops foreign key for table `{{%area}}`
        $this->dropForeignKey(
            '{{%fk-dictamenestecnicos-id_area}}',
            '{{%dictamenestecnicos}}'
        );

        // drops index for column `id_area`
        $this->dropIndex(
            '{{%idx-dictamenestecnicos-id_area}}',
            '{{%dictamenestecnicos}}'
        );

        $this->dropTable('{{%dictamenestecnicos}}');
    }
}
