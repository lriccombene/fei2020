<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%party_contact}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%party_party}}`
 */
class m200427_195331_create_party_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%party_contact}}', [
            'id' => $this->primaryKey(),
            'id_party' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_party`
        $this->createIndex(
            '{{%idx-party_contact-id_party}}',
            '{{%party_contact}}',
            'id_party'
        );

        // add foreign key for table `{{%party_party}}`
        $this->addForeignKey(
            '{{%fk-party_contact-id_party}}',
            '{{%party_contact}}',
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
            '{{%fk-party_contact-id_party}}',
            '{{%party_contact}}'
        );

        // drops index for column `id_party`
        $this->dropIndex(
            '{{%idx-party_contact-id_party}}',
            '{{%party_contact}}'
        );

        $this->dropTable('{{%party_contact}}');
    }
}
