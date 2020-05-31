<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%party_address}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%party_party}}`
 */
class m200427_192037_create_party_address_table extends Migration
{
    /**

     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%party_address}}', [
            'id' => $this->primaryKey(),
            'id_party' => $this->integer()->notNull(),
            'ciudad' => $this->string(),
            'domicilio' => $this->string(),
            'barrio' => $this->string(),

        ]);

        // creates index for column `id_party`
        $this->createIndex(
            '{{%idx-party_address-id_party}}',
            '{{%party_address}}',
            'id_party'
        );

        // add foreign key for table `{{%party_party}}`
        $this->addForeignKey(
            '{{%fk-party_address-id_party}}',
            '{{%party_address}}',
            'id_party',
            '{{%party_party}}',
            'id_party',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%party_party}}`
        $this->dropForeignKey(
            '{{%fk-party_address-id_party}}',
            '{{%party_address}}'
        );

        // drops index for column `id_party`
        $this->dropIndex(
            '{{%idx-party_address-id_party}}',
            '{{%party_address}}'
        );

        $this->dropTable('{{%party_address}}');
    }
}
