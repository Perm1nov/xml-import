<?php

use yii\db\Migration;

/**
 * Handles the creation of table '{{%queue}}'.
 */
class m220403_054906_create_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%queue}}', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'channel' => $this->string(255)->notNull(),
            'job' => $this->binary()->notNull(),
            'pushed_at' => $this->integer(11)->notNull(),
            'ttr' => $this->integer(11)->notNull(),
            'delay' => $this->integer(11)->notNull()->defaultValue(0),
            'priority' => $this->integer(11)->unsigned()->notNull()->defaultValue(1024),
            'reserved_at' => $this->integer(11)->defaultValue(null),
            'attempt' => $this->integer(11)->defaultValue(null),
            'done_at' => $this->integer(11)->defaultValue(null),
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%queue}}');
    }

}
