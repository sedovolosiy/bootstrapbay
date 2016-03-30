<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_email:email',
            'image',
            'first_name',
            'last_name',
            'position',
            'date_of_birth',
            'address',
            'phone',
            'website',
        ],
    ]) ?>

</div>
