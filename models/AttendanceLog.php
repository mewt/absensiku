<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendance_log".
 *
 * @property int $id
 * @property string $attendance_start_date
 * @property string $attendance_end_date
 * @property string $location
 * @property string $longitude
 * @property string $latitude
 * @property int $attendance_id
 *
 * @property Attendance $attendance
 */
class AttendanceLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attendance_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attendance_start_date', 'attendance_end_date'], 'safe'],
            [['location'], 'string'],
            [['attendance_id'], 'required'],
            [['attendance_id'], 'integer'],
            [['longitude', 'latitude'], 'string', 'max' => 255],
            [['attendance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attendance::className(), 'targetAttribute' => ['attendance_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attendance_start_date' => 'Attendance Start Date',
            'attendance_end_date' => 'Attendance End Date',
            'location' => 'Location',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'attendance_id' => 'Attendance ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendance()
    {
        return $this->hasOne(Attendance::className(), ['id' => 'attendance_id']);
    }
}
