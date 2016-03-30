<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */

$this->title = 'Update Personal Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
