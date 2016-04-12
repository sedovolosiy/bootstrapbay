<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Works */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мои работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-group">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php
        $image = $model->getImage();
        ?>

        <?php if ($image) { ?>
            <div class="col-md-3">
                <img src="/<? echo $image->getPath('250x'); ?>">
                <alt
                =""></alt>
                <div class="row">
                    <div class="col-md-12">
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
                    </div>
                </div>
            </div>
        <? } ?>

        <div class="col-md-9">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title',
                    'short_description:html',
                    'description:html',
                    'url:url',
                ],
            ]) ?>
        </div>
    </div>
</div>
