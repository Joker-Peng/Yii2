<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%member}}`.
 */
class m191205_070353_create_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%member}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(20)->notNull()->defaultValue(""),
            'mobile'=> $this->string(11)->notNull()->defaultValue(""),
            'gender'=> $this->tinyInteger(1)->notNull()->defaultValue(0),
            'create_time'=> $this->dateTime(),
            'update_time'=> $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%member}}');
    }
}
