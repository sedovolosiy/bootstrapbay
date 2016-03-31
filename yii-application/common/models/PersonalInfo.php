<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

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
            'user_email' => 'Email',
            'image' => 'Главное фото',
            'del_gallery' =>'Удалить все фото',
            'del_img' =>'Удалить главное фото',
            'first_name' => 'Фамилия',
            'last_name' => 'Имя',
            'position' => 'Должность',
            'date_of_birth' => 'Дата рождения',
            'address' => 'Адресс',
            'phone' => 'Телефон',
            'website' => 'Сайт',
        ];
    }
}
