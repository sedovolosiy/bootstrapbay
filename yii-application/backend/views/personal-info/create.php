<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonalInfo */

$this->title = 'Добавить информацию';
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
