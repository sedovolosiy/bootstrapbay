<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property integer $id
 * @property string $title
 * @property string $date_from
 * @property string $date_to
 * @property string $description
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
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
            'title' => 'Должность',
            'date_from' => 'Дата начала',
            'date_to' => 'Дата окончания',
            'description' => 'Описание',
        ];
    }
}
