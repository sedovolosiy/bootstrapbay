<?php
/**
 * Created by PhpStorm.
 * User: zeol
 * Date: 07.04.16
 * Time: 17:02
 */
namespace backend\modules\api\v1\controllers;

use yii\rest\ActiveController;

class WorksController extends ActiveController
{
    public $modelClass = 'common\models\Works';
}