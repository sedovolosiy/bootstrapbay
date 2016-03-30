<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "personal_info".
 *
 * @property integer $id
 * @property string $user_email
 * @property string $image
 * @property string $first_name
 * @property string $last_name
 * @property string $position
 * @property string $date_of_birth
 * @property string $address
 * @property string $phone
 * @property string $website
 */
class PersonalInfo extends \yii\db\ActiveRecord
{
    public $del_img;

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
        return 'personal_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_email', 'first_name', 'last_name', 'position', 'date_of_birth', 'address', 'phone', 'website'], 'required'],
            [['date_of_birth'], 'safe'],
            [['user_email', 'image', 'first_name', 'last_name', 'position', 'address', 'phone'], 'string', 'max' => 255],
            [['website'], 'string', 'max' => 150],
            [['del_img'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_email' => 'User Email',
            'image' => 'Image',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'position' => 'Position',
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',
            'phone' => 'Phone',
            'website' => 'Website',
        ];
    }
}
