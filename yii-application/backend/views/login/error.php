<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    <?= Html::encode($this->title) ?></h2>
                <div class="error-details">
                    <?= nl2br(Html::encode($message)) ?>
                </div>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Перейти на главную </a><a href="#" class="btn btn-default btn-lg"><span
                            class="glyphicon glyphicon-envelope"></span> Написать администратору </a>
                </div>
            </div>
        </div>
    </div>
</div>