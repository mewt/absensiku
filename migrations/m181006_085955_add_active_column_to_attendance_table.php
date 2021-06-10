<?php

use yii\db\Migration;

/**
 * Handles adding active to table `attendance`.
 */
class m181006_085955_add_active_column_to_attendance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('attendance', 'active', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('attendance', 'active');
    }
}
