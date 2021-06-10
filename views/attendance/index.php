<?php

use app\models\CustomGridExportAttendance;
use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Border;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'employee.full_name',
        'date',
        'attendance_start_date',
        'attendance_end_date',
        'location:ntext',
        'longitude',
        'latitude',

        ['class' => 'yii\grid\ActionColumn'],
    ];

    $defaultStyle = [
        ExportMenu::FORMAT_PDF => [
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_NONE,
                ],
            ],

        ],
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

    echo CustomGridExportAttendance::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'contentAfter' => $contentAfter,
        'exportConfig' => [
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_EXCEL_X => false
            ExportMenu::FORMAT_PDF => [
                'pdfConfig' => ['orientation' => 'L',] //set mpdf properties here
         ]
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
