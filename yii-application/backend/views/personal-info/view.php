<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */

$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Personal Infos', 'url' => ['index']];
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
                                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
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
                            'address',
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

