<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-usersuserprofile-schedule_payment required">
        <label class="control-label" for="usersuserprofile-schedule_payment">Date</label>
        <?= yii\jui\DatePicker::widget(
            [
                'attribute' => 'date',
                'model' => $model,
                'dateFormat'=>'yyyy-MM-dd',
                'options'=>['class'=>'form-control'],
            ]) ?>

        <div class="help-block"></div>
    </div>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'attendance_start_date')->textInput() ?>

    <?= $form->field($model, 'attendance_end_date')->textInput() ?>

<!--    --><?//= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'employee_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Employee::find()->all(), 'id', 'full_name')
    ) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
