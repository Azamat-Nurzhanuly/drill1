<?php

use yii\db\Migration;
use \yii\db\mysql\Schema;

/**
 * Handles the creation for table `employees`.
 */
class m160913_110406_create_employees_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employees}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
            'number' => Schema::TYPE_TEXT,
            'floor' => Schema::TYPE_INTEGER,
            'cabinet' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_DATE,
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%employees}}');
    }
}
