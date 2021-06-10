<?php

use kartik\export\ExportMenu;
use app\models\CustomGridExport;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus berkas ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'attendance_start_date',
            'attendance_end_date',
            'employee.full_name',
            'location:ntext',
            'longitude',
            'latitude',
        ],
    ]) ?>

    <?php Pjax::begin(); ?>
    <?php

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'attendance_start_date',
        'attendance_end_date',
        'location',
        'longitude',
        'latitude',

    ];

    $defaultStyle = [
		ExportMenu::FORMAT_TEXT => false,
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

    echo CustomGridExport::widget([
        'dataProvider' => $dataProviders,
        'columns' => $gridColumns,
        "styleOptions" => $defaultStyle,
        'contentAfter' => $contentAfter
    ]);

    ?>
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProviders,
        //'filterModel' => $SearchModel,
        'columns' => $gridColumns,
        'pjax' => true,
    ]); ?>
    <?php Pjax::end(); ?>
</div>
