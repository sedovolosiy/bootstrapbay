<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Админка',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [

        [
            'label' => 'Информация <i class="fa fa-book"></i>',
            'items' => [
//                '<li class="dropdown-header">Расширения</li>',
//                '<li class="divider"></li>',
                [
                    'label' => 'Перейти к просмотру',
                    'url' => ['/personal-info/index']
                ],
                '<li class="divider"></li>',
                [
                    'label' => '<i class="fa fa-plus"></i> Создать',
                    'url' => ['/personal-info/create']
                ],

            ]
        ],
        [
            'label' => 'Профиль <i class="fa fa-bars"></i>',
            'items' => [
//                '<li class="dropdown-header">Расширения</li>',
//                '<li class="divider"></li>',
                [
                    'label' => 'Перейти к просмотру',
                    'url' => ['/profile/index']
                ],
                '<li class="divider"></li>',
                [
                    'label' => '<i class="fa fa-plus"></i> Создать профиль',
                    'url' => ['/profile/create']
                ],

            ]
        ],
        [
            'label' => 'Мои работы <i class="fa fa-th"></i>',
            'items' => [
//                '<li class="dropdown-header">Расширения</li>',
//                '<li class="divider"></li>',
                [
                    'label' => 'Перейти к просмотру',
                    'url' => ['/works/index']
                ],
                '<li class="divider"></li>',
                [
                    'label' => '<i class="fa fa-plus"></i> Создать',
                    'url' => ['/works/create']
                ],

            ]
        ],
        [
            'label' => 'Опыт работы <i class="fa fa-th"></i>',
            'items' => [
//                '<li class="dropdown-header">Расширения</li>',
//                '<li class="divider"></li>',
                [
                    'label' => 'Перейти к просмотру',
                    'url' => ['/experience/index']
                ],
                '<li class="divider"></li>',
                [
                    'label' => '<i class="fa fa-plus"></i> Создать',
                    'url' => ['/experience/create']
                ],

            ]
        ],
        [
            'label' => 'Образование <i class="fa fa-th"></i>',
            'items' => [
//                '<li class="dropdown-header">Расширения</li>',
//                '<li class="divider"></li>',
                [
                    'label' => 'Перейти к просмотру',
                    'url' => ['/education/index']
                ],
                '<li class="divider"></li>',
                [
                    'label' => '<i class="fa fa-plus"></i> Создать',
                    'url' => ['/education/create']
                ],

            ]
        ],
        [
            'label' => 'Навыки <i class="fa fa-th"></i>',
            'items' => [
//                '<li class="dropdown-header">Расширения</li>',
//                '<li class="divider"></li>',
                [
                    'label' => 'Перейти к просмотру',
                    'url' => ['/skills/index']
                ],
                '<li class="divider"></li>',
                [
                    'label' => '<i class="fa fa-plus"></i> Создать',
                    'url' => ['/skills/create']
                ],

            ]
        ],


    ];
    if(Yii::$app->user->can('admin')){
        $menuItems[] =
            [
                'label' => '<i class="fa fa-key"></i>',
                'items' => [
                    '<li class="dropdown-header">Управление</li>',
                    '<li class="divider"></li>',
                    [
                        'label' => 'Ролями',
                        'url' => ['/permit/access/role']
                    ],
                    '<li class="divider"></li>',
                    [
                        'label' => ' Правилами',
                        'url' => ['/permit/access/permission']
                    ],
                    '<li class="divider"></li>',
                    [
                        'label' => 'Ролью пользователя',
                        'url' => ['/permit/user/view/1']
                    ],
                    '<li class="divider"></li>',
                    [
                        'label' => 'Списком пользователей',
                        'url' => ['/user/index']
                    ],
                ]
            ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login!', 'url' => ['/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/logout'], 'post')
            . Html::submitButton(
                'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'items' => $menuItems,
        'activateParents' => true,
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ]
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
