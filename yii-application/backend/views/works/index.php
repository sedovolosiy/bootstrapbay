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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
        [
            'attribute' => 'short_description',
            'format' =>  ['html'],
            'options' => ['width' => '400']

        ],
//            'short_description:html',
            'description:html',
//            'image',
            // 'url:url',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
