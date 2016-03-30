<?php

namespace common\models;

use Yii;

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
            [['title', 'short_description', 'description', 'image', 'url'], 'required'],
            [['title', 'short_description', 'description', 'image', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'image' => 'Image',
            'url' => 'Url',
        ];
    }
}
