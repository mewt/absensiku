<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property int $id
 * @property string $date
 * @property string $attendance_start_date
 * @property string $attendance_end_date
 * @property int $employee_id
 * @property string $location
 * @property string $longitude
 * @property string $latitude
 *
 * @property Employee $employee
 * @property AttendanceLog[] $attendanceLogs
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'attendance_start_date', 'attendance_end_date'], 'safe'],
            [['employee_id'], 'required'],
            [['employee_id', 'active'], 'integer'],
            [['location'], 'string'],
            [['longitude', 'latitude'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'attendance_start_date' => 'Attendance Start Date',
            'attendance_end_date' => 'Attendance End Date',
            'employee_id' => 'Employee ID',
            'location' => 'Location',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendanceLogs()
    {
        return $this->hasMany(AttendanceLog::className(), ['attendance_id' => 'id']);
    }

}
