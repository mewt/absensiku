<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee`.
 */
class m180925_155024_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'email'=>$this->string()->notNull(),
            'password'=>$this->string()->notNull(),
            'full_name'=>$this->string()->notNull(),
            'address'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('employee');
    }
}
