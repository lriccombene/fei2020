<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actasinspecion}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%localidad}}`
 * - `{{%categoria}}`
 * - `{{%motivo}}`
 * - `{{%empresa}}`
 */
class m200515_210605_create_actasinspecion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actasinspecion}}', [
            'id' => $this->primaryKey(),
            'nro' => $this->integer()->notNull(),
            'fec' => $this->date(),
            'id_localidad' => $this->integer()->notNull(),
            'id_categoria' => $this->integer()->notNull(),
            'id_motivo' => $this->integer()->notNull(),
            'id_empresa' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_localidad`
        $this->createIndex(
            '{{%idx-actasinspecion-id_localidad}}',
            '{{%actasinspecion}}',
            'id_localidad'
        );

        // add foreign key for table `{{%localidad}}`
        $this->addForeignKey(
            '{{%fk-actasinspecion-id_localidad}}',
            '{{%actasinspecion}}',
            'id_localidad',
            '{{%localidad}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_categoria`
        $this->createIndex(
            '{{%idx-actasinspecion-id_categoria}}',
            '{{%actasinspecion}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-actasinspecion-id_categoria}}',
            '{{%actasinspecion}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_motivo`
        $this->createIndex(
            '{{%idx-actasinspecion-id_motivo}}',
            '{{%actasinspecion}}',
            'id_motivo'
        );

        // add foreign key for table `{{%motivo}}`
        $this->addForeignKey(
            '{{%fk-actasinspecion-id_motivo}}',
            '{{%actasinspecion}}',
            'id_motivo',
            '{{%motivo}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-actasinspecion-id_empresa}}',
            '{{%actasinspecion}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-actasinspecion-id_empresa}}',
            '{{%actasinspecion}}',
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
        // drops foreign key for table `{{%localidad}}`
        $this->dropForeignKey(
            '{{%fk-actasinspecion-id_localidad}}',
            '{{%actasinspecion}}'
        );

        // drops index for column `id_localidad`
        $this->dropIndex(
            '{{%idx-actasinspecion-id_localidad}}',
            '{{%actasinspecion}}'
        );

        // drops foreign key for table `{{%categoria}}`
        $this->dropForeignKey(
            '{{%fk-actasinspecion-id_categoria}}',
            '{{%actasinspecion}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-actasinspecion-id_categoria}}',
            '{{%actasinspecion}}'
        );

        // drops foreign key for table `{{%motivo}}`
        $this->dropForeignKey(
            '{{%fk-actasinspecion-id_motivo}}',
            '{{%actasinspecion}}'
        );

        // drops index for column `id_motivo`
        $this->dropIndex(
            '{{%idx-actasinspecion-id_motivo}}',
            '{{%actasinspecion}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-actasinspecion-id_empresa}}',
            '{{%actasinspecion}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-actasinspecion-id_empresa}}',
            '{{%actasinspecion}}'
        );

        $this->dropTable('{{%actasinspecion}}');
    }
}
