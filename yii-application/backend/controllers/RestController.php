<?php
/**
 * Created by PhpStorm.
 * User: zeol
 * Date: 01.04.16
 * Time: 16:20
 */
namespace backend\controllers;

use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $modelClass = 'common\models\PersonalInfo';
}