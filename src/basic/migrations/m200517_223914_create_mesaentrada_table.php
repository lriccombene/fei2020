<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mesaentrada}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categoria}}`
 * - `{{%tipotramite}}`
 * - `{{%empresa}}`
 */
class m200517_223914_create_mesaentrada_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mesaentrada}}', [
            'id' => $this->primaryKey(),
            'fec' => $this->date()->notNull(),
            'fec_ingreso' => $this->date(),
            'id_categoria' => $this->integer()->notNull(),
            'id_tramite' => $this->integer()->notNull(),
            'descripcion' => $this->text(),
            'id_empresa' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_categoria`
        $this->createIndex(
            '{{%idx-mesaentrada-id_categoria}}',
            '{{%mesaentrada}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-mesaentrada-id_categoria}}',
            '{{%mesaentrada}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tramite`
        $this->createIndex(
            '{{%idx-mesaentrada-id_tramite}}',
            '{{%mesaentrada}}',
            'id_tramite'
        );

        // add foreign key for table `{{%tipotramite}}`
        $this->addForeignKey(
            '{{%fk-mesaentrada-id_tramite}}',
            '{{%mesaentrada}}',
            'id_tramite',
            '{{%tipotramite}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-mesaentrada-id_empresa}}',
            '{{%mesaentrada}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-mesaentrada-id_empresa}}',
            '{{%mesaentrada}}',
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
            '{{%fk-mesaentrada-id_categoria}}',
            '{{%mesaentrada}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-mesaentrada-id_categoria}}',
            '{{%mesaentrada}}'
        );

        // drops foreign key for table `{{%tipotramite}}`
        $this->dropForeignKey(
            '{{%fk-mesaentrada-id_tramite}}',
            '{{%mesaentrada}}'
        );

        // drops index for column `id_tramite`
        $this->dropIndex(
            '{{%idx-mesaentrada-id_tramite}}',
            '{{%mesaentrada}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-mesaentrada-id_empresa}}',
            '{{%mesaentrada}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-mesaentrada-id_empresa}}',
            '{{%mesaentrada}}'
        );

        $this->dropTable('{{%mesaentrada}}');
    }
}
