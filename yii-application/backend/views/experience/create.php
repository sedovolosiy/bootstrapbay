<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Experience */

$this->title = 'Добавить опыт работы';
$this->params['breadcrumbs'][] = ['label' => 'Опыт работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experience-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
