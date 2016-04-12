<?php
/**
 * Created by PhpStorm.
 * User: zeol
 * Date: 30.03.16
 * Time: 20:37
 */
$model->image = UploadedFile::getInstance($model, 'image');
if ($model->image) {
    $path = Yii::getAlias('@webroot/upload/files/') . $model->image->baseName . '.$model->image->extension';
    $model->image->saveAs($path);
    $model->attachImage($path);
}