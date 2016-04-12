<?php
/**
 * Created by PhpStorm.
 * User: zeol
 * Date: 07.04.16
 * Time: 17:01
 */
namespace backend\modules\api\v1\controllers;

use yii\rest\ActiveController;

class PersonalInfoController extends ActiveController
{
    public $modelClass = 'common\models\PersonalInfo';
}