<?php
/**
 * Created by PhpStorm.
 * User: andreyderma
 * Date: 25/09/18
 * Time: 23.09
 */

namespace app\modules\v1\controllers;


use app\models\Attendance;
use app\models\AttendanceLog;
use Yii;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;

class AttendanceController extends ActiveController
{
    public $modelClass = 'app\models\Attendance';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function actions(){

        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        unset($actions['create']);
        //unset($actions['update']);
        return $actions;
    }

    public function prepareDataProvider()
    {
        $filter = new ActiveDataFilter([
            'searchModel' => $this->modelClass
        ]);

        $filterCondition = null;
        if ($filter->load(\Yii::$app->request->get())) {
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                // Serializer would get errors out of it
                return $filter;
            }
        }

        $query = Attendance::find();
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

    public function actionCreate(){

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request_post = Yii::$app->getRequest()->getBodyParams();
        $arrData = [
            'Attendance'=>$request_post
        ];
        $model = new $this->modelClass;
        $model->load($arrData);

        $now_date = date("Y-m-d");
        $employee_id = $model->employee_id;

        $get_date = Attendance::findOne([
            'date'=>$now_date,
            'employee_id'=>$employee_id
        ]);
        if(empty($get_date)){
            $model->date = $now_date;
            $model->employee_id = $employee_id;
            $model->attendance_start_date = date("Y-m-d H:i:s");
            $model->active = 1;
            $active = 1;
            if(!$model->save()){
                throw new HttpException(400, "Fields error, cannot save");
            }
            $request_post['attendance_id'] = $model->id;
            $request_post['attendance_start_date'] = $model->attendance_start_date;
        }else{
            if($get_date->active == 1){
                $active = 0;
                $get_date->active = 0;
            }else{
                $active = 1;
                $get_date->active = 1;
            }
            $get_date->attendance_end_date = date("Y-m-d H:i:s");
            $get_date->location = $model->location;
            $get_date->longitude = $model->longitude;
            $get_date->latitude = $model->latitude;
            $get_date->save();
            $request_post['attendance_id'] = $get_date->id;
            $request_post['attendance_start_date'] = $get_date->attendance_start_date;
            $request_post['attendance_end_date'] = $get_date->attendance_end_date;
        }

        unset($request_post['employee_id']);

        $AttendanceLog = [
            'AttendanceLog'=> $request_post
        ];
        $modelLog = new AttendanceLog();
        $modelLog->load($AttendanceLog);
        if(!$modelLog->save()){
            throw new HttpException(400, "Fields error, cannot save");
        }

        $attendance_log = AttendanceLog::find()->where(
            [
                'attendance_id'=>$request_post['attendance_id']
            ]
        )->orderBy('id DESC')->all();

        return [
            'attendance_id'=>$request_post['attendance_id'],
            'active'=>$active,
            'attendance_log'=>$attendance_log,

        ];
    }




}