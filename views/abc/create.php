<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Abc */

$this->title = 'Create Abc';
$this->params['breadcrumbs'][] = ['label' => 'Abcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
