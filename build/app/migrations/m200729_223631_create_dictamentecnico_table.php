<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dictamentecnico}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categoria}}`
 * - `{{%empresa}}`
 * - `{{%area}}`
 * - `{{%yacimiento}}`
 * - `{{%tipodictamen}}`
 * - `{{%tipotrabajo}}`
 */
class m200729_223631_create_dictamentecnico_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dictamentecnico}}', [
            'id' => $this->primaryKey(),
            'fec' => $this->date(),
            'nro' => $this->integer()->notNull(),
            'id_categoria' => $this->integer()->notNull(),
            'id_empresa' => $this->integer()->notNull(),
            'id_area' => $this->integer()->notNull(),
            'id_yacimiento' => $this->integer()->notNull(),
            'id_tipodictamen' => $this->integer()->notNull(),
            'id_tipotrabajo' => $this->integer()->notNull(),
            'detalle' => $this->text(),
            'longitud' => $this->integer(),
            'latitud' => $this->integer(),
        ]);

        // creates index for column `id_categoria`
        $this->createIndex(
            '{{%idx-dictamentecnico-id_categoria}}',
            '{{%dictamentecnico}}',
            'id_categoria'
        );

        // add foreign key for table `{{%categoria}}`
        $this->addForeignKey(
            '{{%fk-dictamentecnico-id_categoria}}',
            '{{%dictamentecnico}}',
            'id_categoria',
            '{{%categoria}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_empresa`
        $this->createIndex(
            '{{%idx-dictamentecnico-id_empresa}}',
            '{{%dictamentecnico}}',
            'id_empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-dictamentecnico-id_empresa}}',
            '{{%dictamentecnico}}',
            'id_empresa',
            '{{%empresa}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_area`
        $this->createIndex(
            '{{%idx-dictamentecnico-id_area}}',
            '{{%dictamentecnico}}',
            'id_area'
        );

        // add foreign key for table `{{%area}}`
        $this->addForeignKey(
            '{{%fk-dictamentecnico-id_area}}',
            '{{%dictamentecnico}}',
            'id_area',
            '{{%area}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_yacimiento`
        $this->createIndex(
            '{{%idx-dictamentecnico-id_yacimiento}}',
            '{{%dictamentecnico}}',
            'id_yacimiento'
        );

        // add foreign key for table `{{%yacimiento}}`
        $this->addForeignKey(
            '{{%fk-dictamentecnico-id_yacimiento}}',
            '{{%dictamentecnico}}',
            'id_yacimiento',
            '{{%yacimiento}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tipodictamen`
        $this->createIndex(
            '{{%idx-dictamentecnico-id_tipodictamen}}',
            '{{%dictamentecnico}}',
            'id_tipodictamen'
        );

        // add foreign key for table `{{%tipodictamen}}`
        $this->addForeignKey(
            '{{%fk-dictamentecnico-id_tipodictamen}}',
            '{{%dictamentecnico}}',
            'id_tipodictamen',
            '{{%tipodictamen}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tipotrabajo`
        $this->createIndex(
            '{{%idx-dictamentecnico-id_tipotrabajo}}',
            '{{%dictamentecnico}}',
            'id_tipotrabajo'
        );

        // add foreign key for table `{{%tipotrabajo}}`
        $this->addForeignKey(
            '{{%fk-dictamentecnico-id_tipotrabajo}}',
            '{{%dictamentecnico}}',
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
            '{{%fk-dictamentecnico-id_categoria}}',
            '{{%dictamentecnico}}'
        );

        // drops index for column `id_categoria`
        $this->dropIndex(
            '{{%idx-dictamentecnico-id_categoria}}',
            '{{%dictamentecnico}}'
        );

        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-dictamentecnico-id_empresa}}',
            '{{%dictamentecnico}}'
        );

        // drops index for column `id_empresa`
        $this->dropIndex(
            '{{%idx-dictamentecnico-id_empresa}}',
            '{{%dictamentecnico}}'
        );

        // drops foreign key for table `{{%area}}`
        $this->dropForeignKey(
            '{{%fk-dictamentecnico-id_area}}',
            '{{%dictamentecnico}}'
        );

        // drops index for column `id_area`
        $this->dropIndex(
            '{{%idx-dictamentecnico-id_area}}',
            '{{%dictamentecnico}}'
        );

        // drops foreign key for table `{{%yacimiento}}`
        $this->dropForeignKey(
            '{{%fk-dictamentecnico-id_yacimiento}}',
            '{{%dictamentecnico}}'
        );

        // drops index for column `id_yacimiento`
        $this->dropIndex(
            '{{%idx-dictamentecnico-id_yacimiento}}',
            '{{%dictamentecnico}}'
        );

        // drops foreign key for table `{{%tipodictamen}}`
        $this->dropForeignKey(
            '{{%fk-dictamentecnico-id_tipodictamen}}',
            '{{%dictamentecnico}}'
        );

        // drops index for column `id_tipodictamen`
        $this->dropIndex(
            '{{%idx-dictamentecnico-id_tipodictamen}}',
            '{{%dictamentecnico}}'
        );

        // drops foreign key for table `{{%tipotrabajo}}`
        $this->dropForeignKey(
            '{{%fk-dictamentecnico-id_tipotrabajo}}',
            '{{%dictamentecnico}}'
        );

        // drops index for column `id_tipotrabajo`
        $this->dropIndex(
            '{{%idx-dictamentecnico-id_tipotrabajo}}',
            '{{%dictamentecnico}}'
        );

        $this->dropTable('{{%dictamentecnico}}');
    }
}
