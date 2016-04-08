<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <div class="col-md-12">
        <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
            'showHeader' => true,
            'showFooter'=> false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered;',
            ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
//                'attribute'=>'title',
                'header'=>'Заголовок',
//                'contentOptions' =>['class' => 'table_class','style'=>'display:inline;'],
                'content' => function ($model) {
                    return $model->title;
                }
            ],
        [
            'header'=>'Краткое описание',
            'attribute' => 'short_description',
            'format' =>  ['html'],

        ],
//            'short_description:html',
//            'description:html',
//            [
////                'attribute'=>'description',
//                'header'=>'Описание',
////                'contentOptions' =>['class' => 'table_class','style'=>'display:inline;'],
//                'content' => function ($model) {
//                    return $model->description;
//                }
//            ],
            [
//                'attribute'=>'title',
                'header'=>'Картинка',
                'format' =>  'raw',
//                'contentOptions' =>['class' => 'table_class','style'=>'display:inline;'],
                'content' => function ($model) {
                    return Html::img(Url::toRoute('/' . $model->getImage()->getPath('x100')),[
                        'alt'=>'yii2 - картинка в gridview',
//                        'style' => 'width:100px;'
                    ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80px'],
                'template' => '{view} {update} {delete}{link}',],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
