<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Works */

$this->title = 'Добавить свои работы';
$this->params['breadcrumbs'][] = ['label' => 'Мои работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
