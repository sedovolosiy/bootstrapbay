<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Works */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мои работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'short_description',
            'description',
            'image',
            'url:url',
        ],
    ]) ?>

</div>
