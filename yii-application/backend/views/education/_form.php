<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'date_from')->widget(DatePicker::className(), [])
//        //'language' => 'ru',
//        //'dateFormat' => 'yyyy-MM-dd',
//     ?>

<!--    --><?//= $form->field($model, 'date_to')->textInput()?><!-- ?>-->
    <div class="form-group">
    <?php echo '<label class="control-label">Valid Dates</label>';
                echo DatePicker::widget([
                'name' => 'date_from',
                'value' => '01-Feb-1996',
                'type' => DatePicker::TYPE_RANGE,
                'name2' => 'date_to',
                'value2' => '27-Feb-1996',
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-M-yyyy'
                ]
    ]);?>
        </div>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
