<?php Pjax::begin(); ?>    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'title',
        'value',
        'status',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'headerOptions' => ['width' => '100'],
            'template' => '{status} {view} {update} {delete}',
            'buttons' => [
                'status' => function ($url, $model) {
                    return $model->status == 1 ? Html::a('<i class="fa fa-check-circle-o fa-lg"></i>Active',
                        $url,
                        [
                            'title' => Yii::t('app', 'Status'),
                            'class' => 'btn btn-primary btn-xs',
                        ]) : Html::a('<i class="fa fa-check-circle-o"></i>Pass', $url,
                        ['title' => Yii::t('app', 'Status'), 'class' => 'btn btn-primary btn-xs',]);
                },
//                            'status' =>$model->status
                [
                    'id' => "status_change",
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'change-visible') {
                        $url = '/skills/change-visible?id=' . $model->id;
                        return $url;
                    }
                }
            ],


        ]

    ]
]);
?>
<?php Pjax::end(); ?>


/*

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Навыки';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/visible.js');
?>
<div class="skills-index">

    <h1 data-href="ddddd" data-status="1" data-id="2"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить навыки', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'value',
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{status} {view} {update} {delete}',
                'buttons' => [
                    'status' => function ($model) {
                        return $model->status == 1 ? Html::a('<i class="fa fa-eye"></i> Active',
                            ['skills/change-visible', 'id' => $model->id, 'status' => $model->status],
//                            'status' =>$model->status
                            [
                                'title' => 'Status',
                                'id' => "status_change",
                                'class' => 'btn btn-primary btn-xs btn-success',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]) :
                            Html::a('<i class="fa fa-eye-slash"></i> Pass',
                                ['skills/change-visible', 'id' => $model->id, 'status' => $model->status],
//                            'status' =>$model->status
                                [
                                    'title' => 'Status',
                                    'id' => "status_change",
                                    'class' => 'btn btn-primary btn-xs btn-warning',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]);
                    },
                ],
            ],
        ]
    ]); ?>
    <?php Pjax::end(); ?></div>


*/
