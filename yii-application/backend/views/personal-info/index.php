<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PersonalInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $models backend\controllers\PersonalInfoController */


$this->title = 'Информация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!---->
    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'user_email:email',
            'first_name',
            'last_name',
            [
//                'attribute'=>'title',
                'header' => 'Картинка',
                'format' => 'raw',
//                'contentOptions' =>['class' => 'table_class','style'=>'display:inline;'],
                'content' => function ($model) {
                    return Html::img(Url::toRoute('/' . $model->getImage()->getPath('x100')), [
                        'alt' => 'yii2 - картинка в gridview',
//                        'style' => 'width:100px;'
                    ]);
                },
            ],

            // 'position',
            'date_of_birth',
//             'address',
//             'phone',
//             'website',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
