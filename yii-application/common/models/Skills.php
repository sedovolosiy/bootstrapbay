<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property integer $id
 * @property string $title
 * @property integer $value
 * @property integer $status
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value'], 'required'],
            [['value', ], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['status'], 'boolean'],
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
            'value' => 'Value',
            'status' => 'Status',
        ];
    }

    public function changeVisible($status)
    {
//        if($status ===1) !status
        $this->status = ($status == 1) ? 0 : 1;
        $this->update();
    }
}
