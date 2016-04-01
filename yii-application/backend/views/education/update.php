<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Education */

$this->title = 'Обновить образование в: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Образование', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="education-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
