<?php
/**
 * Created by PhpStorm.
 * User: andreyderma
 * Date: 25/09/18
 * Time: 23.17
 */

namespace app\modules\v1\controllers;


use yii\rest\ActiveController;

class EmployeeController extends ActiveController
{
    public $modelClass = 'app\models\Employee';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
}