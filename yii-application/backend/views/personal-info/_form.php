<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-info-form" xmlns="http://www.w3.org/1999/html">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-md-10">
<!--        --><?php
//                $images = $model->getImages();
////      ?>
            <div class="row">
<!---->
<!--            --><?php //foreach ($images as $image): ?>
<!--                <div class="col-md-3">-->
<!--                    <img src="--><?//=$image->getUrl('x300')?><!--" alt="">-->
<!--                </div>-->
<!---->
<!--            --><?php //endforeach ?>
                <?php
                $image = $model->getImage();

                ?>
                <?php if($image){ ?>
                <div class="col-md-3">
                    <img src="/<? echo $image->getPath('x300'); ?>"><alt=""></alt>
                    <?= $form->field($model,'del_img')->checkBox(['class'=>'span-1']) ?>
                </div>
                <? }?>
            </div>
        </div>
    </div>

<!--    <div class="form-group">-->
<!--        --><?php //$image = $model->getImage(); ?>
<!--        --><?php //if($image){ ?>
<!--            --><?//= Html::submitButton('Удалить фото', $model->removeImage($image)) ?>
<!--        --><?// }?>
<!--    </div>-->

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>