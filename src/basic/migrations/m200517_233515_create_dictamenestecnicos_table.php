<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dictamenestecnicos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categoria}}`
 * - `{{%empresa}}`
 * - `{{%area}}`
 * - `{{%yasimiento}}`
 * - `{{%tipodictamente}}`
 * - `{{%tipotrabajo}}`
 */
class m200517_233515_create_dictamenestecnicos_table extends Migration
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
            'id_yasicmiento' => $this->integer()->notNull(),
            'id_tipodictamente' => $this->integer()->notNull(),
            'id_tipotrabajo' => $this->integer()->notNull(),
            'detalle' => $this->text(),
            'longitud' => $this->integer(),
            'latitud' => $this->integer(),
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

        // creates index for column `id_yasicmiento`
        $this->createIndex(
            '{{%idx-dictamenestecnicos-id_yasicmiento}}',
            '{{%dictamenestecnicos}}',
            'id_yasicmiento'
        );

        // add foreign key for table `{{%yasimiento}}`
        $this->addForeignKey(
            '{{%fk-dictamenestecnicos-id_yasicmiento}}',
            '{{%dictamenestecnicos}}',
            'id_yasicmiento',
            '{{%yasimiento}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tipodictamente`
        $this->createIndex(
            '{{%idx-dictamenestecnicos-id_tipodictamente}}',
            '{{%dictamenestecnicos}}',
            'id_tipodictamente'
        );

        // add foreign key for table `{{%tipodictamente}}`
        $this->addForeignKey(
            '{{%fk-dictamenestecnicos-id_tipodictamente}}',
            '{{%dictamenestecnicos}}',
            'id_tipodictamente',
            '{{%tipodictamente}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tipotrabajo`
        $this->createIndex(
            '{{%idx-dictamenestecnicos-id_tipotrabajo}}',
            '{{%dictamenestecnicos}}',
            'id_tipotrabajo'
        );

        // add foreign key for table `{{%tipotrabajo}}`
        $this->addForeignKey(
            '{{%fk-dictamenestecnicos-id_tipotrabajo}}',
            '{{%dictamenestecnicos}}',
            'id_tipotrabajo',
            '{{%tipotrabajo}}',
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

        // drops foreign key for table `{{%yasimiento}}`
        $this->dropForeignKey(
            '{{%fk-dictamenestecnicos-id_yasicmiento}}',
            '{{%dictamenestecnicos}}'
        );

        // drops index for column `id_yasicmiento`
        $this->dropIndex(
            '{{%idx-dictamenestecnicos-id_yasicmiento}}',
            '{{%dictamenestecnicos}}'
        );

        // drops foreign key for table `{{%tipodictamente}}`
        $this->dropForeignKey(
            '{{%fk-dictamenestecnicos-id_tipodictamente}}',
            '{{%dictamenestecnicos}}'
        );

        // drops index for column `id_tipodictamente`
        $this->dropIndex(
            '{{%idx-dictamenestecnicos-id_tipodictamente}}',
            '{{%dictamenestecnicos}}'
        );

        // drops foreign key for table `{{%tipotrabajo}}`
        $this->dropForeignKey(
            '{{%fk-dictamenestecnicos-id_tipotrabajo}}',
            '{{%dictamenestecnicos}}'
        );

        // drops index for column `id_tipotrabajo`
        $this->dropIndex(
            '{{%idx-dictamenestecnicos-id_tipotrabajo}}',
            '{{%dictamenestecnicos}}'
        );

        $this->dropTable('{{%dictamenestecnicos}}');
    }
}
