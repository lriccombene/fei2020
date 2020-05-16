<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actasinspeccion}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%localidad}}`
 * - `{{%categoria}}`
 * - `{{%motivo}}`
 * - `{{%empresa}}`
 * - `{{%area}}`
 */
class m200516_140046_create_actasinspeccion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actasinspeccion}}', [
            'id' => $this->primaryKey(),
            'nro' => $this->integer()->notNull(),
            'fec' => $this->date(),
            'id_localidad' => $this->integer()->notNull(),
            'id_categoria' => $this->integer()->notNull(),
            'id_motivo' => $this->integer()->notNull(),
            'id_empresa' => $this->integer()->notNull(),
            'id_area' => $this->integer()->notNull(),
            'latitud' => $this->integer(),
            'longitud' => $this->integer(),
        ]);

        // creates index for column `id_localidad`
        $this->createIndex(
            '{{%idx-actasinspeccion-id_localidad}}',
            '{{%actasinspeccion}}',
            'id_localidad'
        );

        // add foreign key for table `{{%localidad}}`
        $this->addForeignKey(
            '{{%fk-actasinspeccion-id_localidad}}',
            '{{%actasinspeccion}}',
            'id_localidad',
            '{{%localidad}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_categoria`
        $this->createIndex(
            '{{%idx-actasinspeccion-id_categoria}}',
            '{{%actasinspeccion}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-actasinspeccion-id_categoria}}',
            '{{%actasinspeccion}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_motivo`
        $this->createIndex(
            '{{%idx-actasinspeccion-id_motivo}}',
            '{{%actasinspeccion}}',
            'id_motivo'
        );

        // add foreign key for table `{{%motivo}}`
        $this->addForeignKey(
            '{{%fk-actasinspeccion-id_motivo}}',
            '{{%actasinspeccion}}',
            'id_motivo',
            '{{%motivo}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-actasinspeccion-id_empresa}}',
            '{{%actasinspeccion}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-actasinspeccion-id_empresa}}',
            '{{%actasinspeccion}}',
            'id_empresa',
            '{{%empresa}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_area`
        $this->createIndex(
            '{{%idx-actasinspeccion-id_area}}',
            '{{%actasinspeccion}}',
            'id_area'
        );

        // add foreign key for table `{{%area}}`
        $this->addForeignKey(
            '{{%fk-actasinspeccion-id_area}}',
            '{{%actasinspeccion}}',
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
        // drops foreign key for table `{{%localidad}}`
        $this->dropForeignKey(
            '{{%fk-actasinspeccion-id_localidad}}',
            '{{%actasinspeccion}}'
        );

        // drops index for column `id_localidad`
        $this->dropIndex(
            '{{%idx-actasinspeccion-id_localidad}}',
            '{{%actasinspeccion}}'
        );

        // drops foreign key for table `{{%categoria}}`
        $this->dropForeignKey(
            '{{%fk-actasinspeccion-id_categoria}}',
            '{{%actasinspeccion}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-actasinspeccion-id_categoria}}',
            '{{%actasinspeccion}}'
        );

        // drops foreign key for table `{{%motivo}}`
        $this->dropForeignKey(
            '{{%fk-actasinspeccion-id_motivo}}',
            '{{%actasinspeccion}}'
        );

        // drops index for column `id_motivo`
        $this->dropIndex(
            '{{%idx-actasinspeccion-id_motivo}}',
            '{{%actasinspeccion}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-actasinspeccion-id_empresa}}',
            '{{%actasinspeccion}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-actasinspeccion-id_empresa}}',
            '{{%actasinspeccion}}'
        );

        // drops foreign key for table `{{%area}}`
        $this->dropForeignKey(
            '{{%fk-actasinspeccion-id_area}}',
            '{{%actasinspeccion}}'
        );

        // drops index for column `id_area`
        $this->dropIndex(
            '{{%idx-actasinspeccion-id_area}}',
            '{{%actasinspeccion}}'
        );

        $this->dropTable('{{%actasinspeccion}}');
    }
}
