<?php

use app\models\CustomGridExport;
use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Border;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    
    $defaultStyle = [
        ExportMenu::FORMAT_PDF => [
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_NONE,
                ],
            ],

        ],
    ];

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'email:email',
        'full_name',
        'address:ntext',
        'jabatan',
        ['class' => 'yii\grid\ActionColumn'],
    ];

    $arr = [];
    for($a=1; $a<=10; $a++){
        $arr[] = [
            "value" => " ",
            "styleOptions" => $defaultStyle
        ];
    }

    $merge = [
        [
            "value" => "Tanda Tangan",
            "styleOptions" => $defaultStyle
        ],
        [
            "value" => " ",
            "styleOptions" => $defaultStyle
        ],
        [
            "value" => " ",
            "styleOptions" => $defaultStyle
        ],
        [
            "value" => " ",
            "styleOptions" => $defaultStyle
        ],
        [
            "value" => " ",
            "styleOptions" => $defaultStyle
        ],
        [
            "value" => "Manager Keystone",
            "styleOptions" => $defaultStyle
        ]
    ];

    $contentAfter = ArrayHelper::merge($arr, $merge);

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'contentAfter' => $contentAfter,
        'exportConfig' => [
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_EXCEL_X => false
        ],
    ]);
    ?>
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>
    <?php Pjax::end(); ?>
</div>
