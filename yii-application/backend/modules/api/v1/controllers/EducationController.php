<?php
/**
 * Created by PhpStorm.
 * User: zeol
 * Date: 07.04.16
 * Time: 17:03
 */
namespace backend\modules\api\v1\controllers;

use yii\rest\ActiveController;

class EducationController extends ActiveController
{
    public $modelClass = 'common\models\Education';
}