<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attendance_detail`.
 */
class m180925_155319_create_attendance_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attendance_log', [
            'id' => $this->primaryKey(),
            'attendance_start_date'=>$this->dateTime()->null(),
            'attendance_end_date'=>$this->dateTime()->null(),
            'location'=>$this->text()->null(),
            'longitude'=>$this->string()->null(),
            'latitude'=>$this->string()->null(),
            'attendance_id'=>$this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-attendance_detail-attendance_id',
            'attendance_log',
            'attendance_id',
            'attendance',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('attendance_log');
    }
}
