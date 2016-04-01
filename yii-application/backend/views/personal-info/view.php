<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */

$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-group">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
            <?php
            $image = $model->getImage();
            ?>

                <?php if($image){ ?>
                    <div class="col-md-3">
                        <img src="/<? echo $image->getPath('x300'); ?>"><alt=""></alt>
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
                <? }?>

                <div class="col-md-9">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'user_email:email',
//            'image',
                            'first_name',
                            'last_name',
                            'position',
                            'date_of_birth',
                            'address:html',
                            'phone',
                            'website',
                        ],
                    ]) ?>
                </div>
    </div>
</div>
<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'user_email:email',
////            'image',
//            'first_name',
//            'last_name',
//            'position',
//            'date_of_birth',
//            'address',
//            'phone',
//            'website',
//        ],
//    ]) ?>

