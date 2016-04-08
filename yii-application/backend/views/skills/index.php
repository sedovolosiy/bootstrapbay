<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Progress;

//use Yii;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Навыки';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/visible.js');
?>
<div class="skills-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить навыки', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'attribute' => 'value',
                'header' => 'Значение',
                'content' => function ($model) {
                    if ($model->value <= 50):
                        return Progress::widget([
                            'percent' => $model->value,
                            'label' => $model->value . ' %',
                            'barOptions' => ['class' => 'progress-bar-danger']
                        ]);
                    elseif ($model->value <= 70):
                        return Progress::widget([
                            'percent' => $model->value,
                            'label' => $model->value . ' %',
                            'barOptions' => ['class' => 'progress-bar-warning']
                        ]);
                    elseif ($model->value <= 100):
                        return Progress::widget([
                            'percent' => $model->value,
                            'label' => $model->value . ' %',
                            'barOptions' => ['class' => 'progress-bar-success']
                        ]);

                    endif;
                }
            ],

            [
                'header' => 'Статус',
//                'attribute'=>'status',
                'contentOptions' =>['style'=>'display:block;'],
                'headerOptions' => ['width' => '80'],
                'content' => function ($model) {
                    return $model->status == 1 ? Html::button('<i class="fa fa-eye"></i> Active',
                        [
                            'title' => 'Status',
                            'class' => 'status-button btn btn-primary btn-xs btn-success',
                            'data-href' => '/skills/change-visible',
                            'data-status' => $model->status,
                            'data-id' => $model->id,
                            'data-method' => 'post',

                        ])
                        :
                        Html::button('<i class="fa fa-eye-slash"></i> Pass',
                            [
                                'title' => 'Status',
                                'class' => 'status-button btn btn-primary btn-xs btn-warning',
                                'data-href' => '/skills/change-visible',
                                'data-status' => $model->status,
                                'data-id' => $model->id,
                                'data-method' => 'post',
                            ]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
            ],
        ]
    ]); ?>
    <?php Pjax::end(); ?></div>
