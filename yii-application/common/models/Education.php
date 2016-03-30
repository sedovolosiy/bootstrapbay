<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property string $title
 * @property string $date_from
 * @property string $date_to
 * @property string $description
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'date_from', 'date_to', 'description'], 'required'],
            [['date_from', 'date_to'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
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
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'description' => 'Description',
        ];
    }
}
