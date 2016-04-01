<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <!--    --><? //= $form->field($model, 'date_from')->widget(DateRangePicker::className(), [
    //        'attributeTo' => 'date_to',
    //        'form' => $form, // best for correct client validation
    //        'language' => 'ru',
    //        'size' => 'lg',
    //        'clientOptions' => [
    //            'autoclose' => true,
    //            'format' => 'yyyy-M-dd'
    //        ]
    //    ]);?>

    <!--    --><? //= $form->field($model,'date_from')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>
    <!---->
    <!--    --><? //= $form->field($model,'date_to')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>

<!--    --><?//= $form->field($model, 'date_from')->widget(DateControl::classname(), [
//        'type' => DateControl::FORMAT_DATE,
//        'ajaxConversion' => true,
//        'options' => [
//            'pluginOptions' => [
//                'autoclose' => true
//            ]
//        ]
//    ]); ?>
<!---->
<!--    --><?//= $form->field($model, 'date_to')->widget(DateControl::classname(), [
//        'type' => DateControl::FORMAT_DATE,
//        'displayFormat'=> 'dd MM yyyy',
//        'ajaxConversion' => true,
//        'options' => [
//            'pluginOptions' => [
//                'autoclose' => true,
//
//            ]
//        ]
//    ]); ?>

    <? echo '<label class="control-label">Выберите период</label>';
    echo DatePicker::widget([
    'model' => $model,
    'attribute' => 'date_from',
    'attribute2' => 'date_to',
    'options' => ['placeholder' => 'Start date'],
    'options2' => ['placeholder' => 'End date'],
    'type' => DatePicker::TYPE_RANGE,
    'form' => $form,
    'pluginOptions' => [
    'format' => 'yyyy-mm-dd',
    'autoclose' => true,
    ]
    ]);?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false,
            //по умолчанию false
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
