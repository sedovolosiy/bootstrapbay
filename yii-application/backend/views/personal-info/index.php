<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PersonalInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personal Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_email:email',
            'image',
            'first_name',
            'last_name',
            // 'position',
            // 'date_of_birth',
            // 'address',
            // 'phone',
            // 'website',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>