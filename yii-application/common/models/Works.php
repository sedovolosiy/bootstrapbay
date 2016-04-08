<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "works".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $image
 * @property string $url
 */
class Works extends \yii\db\ActiveRecord
{
    public $del_img;
    public $del_gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'short_description', 'description', 'url'], 'required'],
            [['title', 'short_description', 'description', 'image', 'url'], 'string', 'max' => 255],
            [['del_img', 'del_gallery'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'short_description' => 'Короткое описание',
            'description' => 'Описание',
            'image' => 'Изображение',
            'del_gallery' => 'Удалить все фото',
            'del_img' => 'Удалить главное фото',
            'url' => 'Сайт',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'title',
            'short_description',
            'description',
            'image' => function ($model) {
                return '/' . $model->getImage()->getPath('x100');
            },
            'url',

        ];
    }

    public function extraFields()
    {
        return ['status'];
    }
}
