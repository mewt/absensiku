<?php
/**
 * Created by PhpStorm.
 * User: andreyderma
 * Date: 29/09/18
 * Time: 15.50
 */

namespace app\modules\v1\controllers;



use app\models\Employee;
use yii\web\HttpException;
use yii\rest\Controller;

class LoginController extends Controller
{
    protected function verbs()
    {
        return [
            'index' => ['POST']
        ];
    }

    public function actionIndex(){
        $jsonPost = \Yii::$app->getRequest()->getBodyParams();
        $arr = [
            "success"=>false,
            "data"=>[]
        ];

        if(!empty($jsonPost['email']) && !empty($jsonPost['password'])){
            $password = $jsonPost['password'];
            $email = $jsonPost['email'];
            $employee = Employee::find()->where(
                [
                    'email'=>$email,
                    'password'=>md5($password)
                ]
            )->one();
            if($employee){
                unset($employee['password']);
                $arr['success'] = true;
                $arr['data'] = $employee;
            }else{
                throw new HttpException(401, $this->_getStatusCodeMessage(401));
            }
        }else{
            throw new HttpException(400, $this->_getStatusCodeMessage(400));
        }

        return $arr;
    }

    private function _getStatusCodeMessage($status)
    {
        $codes = [
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        ];
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}