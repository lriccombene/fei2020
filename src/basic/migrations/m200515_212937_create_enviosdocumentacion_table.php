<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enviosdocumentacion}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%relevancia}}`
 */
class m200515_212937_create_enviosdocumentacion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enviosdocumentacion}}', [
            'id' => $this->primaryKey(),
            'fec' => $this->date(),
            'transporte' => $this->string(),
            'id_relevancia' => $this->integer()->notNull(),
            'detalle' => $this->text(),
            'archivo_urlnotificado' => $this->string(),
            'destino' => $this->string(),
            'fec_notificado' => $this->date(),
        ]);

        // creates index for column `id_relevancia`
        $this->createIndex(
            '{{%idx-enviosdocumentacion-id_relevancia}}',
            '{{%enviosdocumentacion}}',
            'id_relevancia'
        );

        // add foreign key for table `{{%relevancia}}`
        $this->addForeignKey(
            '{{%fk-enviosdocumentacion-id_relevancia}}',
            '{{%enviosdocumentacion}}',
            'id_relevancia',
            '{{%relevancia}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%relevancia}}`
        $this->dropForeignKey(
            '{{%fk-enviosdocumentacion-id_relevancia}}',
            '{{%enviosdocumentacion}}'
        );

        // drops index for column `id_relevancia`
        $this->dropIndex(
            '{{%idx-enviosdocumentacion-id_relevancia}}',
            '{{%enviosdocumentacion}}'
        );

        $this->dropTable('{{%enviosdocumentacion}}');
    }
}
