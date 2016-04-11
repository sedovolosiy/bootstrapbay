<?php
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Админка</h1>

        <p class="lead">Вы вошли в административную часть сайта. Выберите нужный пункт меню.</p>
        <?php if (Yii::$app->user->can('admin')) {
            $userRole = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
            $value = ArrayHelper::getValue($userRole, 'admin.description');
            echo "Роль присвоена $value";
        } elseif (Yii::$app->user->can('editor')) {
            $userRole = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
            $value = ArrayHelper::getValue($userRole, 'editor.description');
            echo "Роль присвоена $value";
        } else {
            echo 'Роль присвоена Пользователь';
        }
        ?>
    </div>

    <div class="body-content">

        <div class="row">


        </div>

    </div>
</div>