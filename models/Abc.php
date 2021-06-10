<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "abc".
 *
 * @property int $id
 * @property string $full_name
 * @property string $address
 */
class Abc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['address'], 'string'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'address' => 'Address',
        ];
    }
}
