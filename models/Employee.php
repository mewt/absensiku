<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $full_name
 * @property string $address
 *
 * @property Attendance[] $attendances
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'full_name'], 'required'],
            [['password'], 'required', 'on' => 'create'],
            [['address'], 'string'],
            [['email', 'password', 'full_name', 'jabatan'], 'string', 'max' => 255],
            ['email', 'email'],
            ['email', 'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'full_name' => 'Full Name',
            'address' => 'Address',
            'jabatan'=>'Jabatan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['employee_id' => 'id']);
    }

    public function fields()
    {
        return [
            'id',
            'email',
            'full_name',
            'address'
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                $this->password = md5($this->password);
            }
            return true;
        } else {
            return false;
        }
    }
}
