<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attendance`.
 */
class m180925_155314_create_attendance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attendance', [
            'id' => $this->primaryKey(),
            'date'=>$this->date()->null(),
            'attendance_start_date'=>$this->dateTime()->null(),
            'attendance_end_date'=>$this->dateTime()->null(),
            'employee_id'=>$this->integer()->notNull(),
            'location'=>$this->text()->null(),
            'longitude'=>$this->string()->null(),
            'latitude'=>$this->string()->null(),
        ]);

        $this->addForeignKey(
            'fk-attendance-employee_id',
            'attendance',
            'employee_id',
            'employee',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('attendance');
    }
}
