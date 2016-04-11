<?php
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Админка</h1>

        <p class="lead">Вы вошли в административную часть сайта. Выберите нужный пункт меню.</p>
        <?php if(Yii::$app->user->can('admin')){
            echo 'Роль присвоена Администратор';
        }
        elseif(Yii::$app->user->can('editor')){
                echo 'Роль присвоена Модератор';
            }
        else{
            echo 'Роль присвоена Пользователь';
        }
        ?>
    </div>

    <div class="body-content">

        <div class="row">


        </div>

    </div>
</div>
