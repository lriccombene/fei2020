<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mesadeentrada}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categoria}}`
 * - `{{%tipotramite}}`
 * - `{{%empresa}}`
 */
class m200515_203650_create_mesadeentrada_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mesadeentrada}}', [
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
            '{{%idx-mesadeentrada-id_categoria}}',
            '{{%mesadeentrada}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-mesadeentrada-id_categoria}}',
            '{{%mesadeentrada}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tramite`
        $this->createIndex(
            '{{%idx-mesadeentrada-id_tramite}}',
            '{{%mesadeentrada}}',
            'id_tramite'
        );

        // add foreign key for table `{{%tipotramite}}`
        $this->addForeignKey(
            '{{%fk-mesadeentrada-id_tramite}}',
            '{{%mesadeentrada}}',
            'id_tramite',
            '{{%tipotramite}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-mesadeentrada-id_empresa}}',
            '{{%mesadeentrada}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-mesadeentrada-id_empresa}}',
            '{{%mesadeentrada}}',
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
            '{{%fk-mesadeentrada-id_categoria}}',
            '{{%mesadeentrada}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-mesadeentrada-id_categoria}}',
            '{{%mesadeentrada}}'
        );

        // drops foreign key for table `{{%tipotramite}}`
        $this->dropForeignKey(
            '{{%fk-mesadeentrada-id_tramite}}',
            '{{%mesadeentrada}}'
        );

        // drops index for column `id_tramite`
        $this->dropIndex(
            '{{%idx-mesadeentrada-id_tramite}}',
            '{{%mesadeentrada}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-mesadeentrada-id_empresa}}',
            '{{%mesadeentrada}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-mesadeentrada-id_empresa}}',
            '{{%mesadeentrada}}'
        );

        $this->dropTable('{{%mesadeentrada}}');
    }
}
