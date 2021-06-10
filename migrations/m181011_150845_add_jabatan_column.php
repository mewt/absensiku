<?php

use yii\db\Migration;

/**
 * Class m181011_150845_add_jabatan_column
 */
class m181011_150845_add_jabatan_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('employee', 'jabatan', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181011_150845_add_jabatan_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181011_150845_add_jabatan_column cannot be reverted.\n";

        return false;
    }
    */
}
