<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group">
        <div class="container">


            <div class="row">

                <?php
                $image = $model->getImage();

                ?>
                <?php if($image){ ?>
                    <div class="col-md-9">
                        <img src="/<? echo $image->getPath('x300'); ?>" alt="<?= $model->title ?>">
                        <!--                    --><?//= $form->field($model,'del_img')->checkBox(['class'=>'span-1']) ?>
                    </div>
                <? }?>
                <?php
                $images = $model->getImages();

                ?>
                <?php foreach ($images as $image): ?>

                    <div class="col-md-3">
                        <?php if($image){ ?>
                            <img src="<?=$image->getUrl('x100')?>" alt="<?= $model->title ?>">
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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false,
            //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false,
            //по умолчанию false
        ],
    ]); ?>


    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
