<?php

use yii\db\Migration;

/**
 * Class m181011_151336_create_table_abc
 */
class m181011_151336_create_table_abc extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('abc', [
            'id' => $this->primaryKey(),
            'full_name'=>$this->string()->notNull(),
            'address'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181011_151336_create_table_abc cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181011_151336_create_table_abc cannot be reverted.\n";

        return false;
    }
    */
}
