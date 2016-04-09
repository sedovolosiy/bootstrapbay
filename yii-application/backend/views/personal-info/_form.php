<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-info-form" xmlns="http://www.w3.org/1999/html">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group">
        <div class="container">


            <div class="row">

                <?php
                $image = $model->getImage();

                ?>
                <?php if($image){ ?>
                <div class="col-md-9">
                    <img src="/<? echo $image->getPath('x300'); ?>" alt="<?= $model->first_name . ' '. $model->last_name ?>">
<!--                    --><?//= $form->field($model,'del_img')->checkBox(['class'=>'span-1']) ?>
                </div>
                <? }?>
                <?php
                $images = $model->getImages();

                ?>
                <?php foreach ($images as $image): ?>

                    <div class="col-md-3">
                        <?php if($image){ ?>
                            <img src="<?=$image->getUrl('x100')?>" alt="<?= $model->first_name . ' '. $model->last_name ?>">
                        <? }?>
                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <?= $form->field($model,'del_img')->checkBox(['class'=>'span-1']) ?>
            </div>
            <div class="col-xs-4">
                <?= $form->field($model,'del_gallery')->checkBox(['class'=>'span-1']) ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'user_email')->input('email') ?>


    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'date_of_birth')->textInput() ?>

    <?echo $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'autoclose'=>true
    ]
    ]); ?>

    <?=  $form->field($model, 'address')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);?>


    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
