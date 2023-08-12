<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%complete_lesson_to_user}}`.
 */
class m230812_130758_create_complete_lesson_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complete_lesson_to_user}}', [
            'user_id' => $this->integer()->notNull(),
            'lesson_id' => $this->integer()->notNull()
        ]);

        $this->addPrimaryKey('complete_lesson_to_user', '{{%complete_lesson_to_user}}', ['user_id', 'lesson_id']);
        $this->addForeignKey(
            'complete_lesson_to_user-to-lesson-fk',
            '{{%complete_lesson_to_user}}',
            ['lesson_id'],
            '{{%lesson}}',
            ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%complete_lesson_to_user}}');
    }
}
